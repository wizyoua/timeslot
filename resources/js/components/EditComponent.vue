<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form @submit.prevent="update">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" v-model="timeslot.title" maxlength="20" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" v-model="timeslot.start_date" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date" v-model="timeslot.end_date" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="start_time">Start Time</label>
                                <input type="time" class="form-control" name="start_time" v-model="timeslot.start_time" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="end_time">End Time</label>
                                <input type="time" class="form-control" name="end_time" v-model="timeslot.end_time" required>
                            </div>
                            <div class="form-group mb-3" >
                                <input type="hidden" class="form-control" name="cancel_state" v-model="timeslot.cancel_state" required>
                            </div>

                            <hr>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted(){
        this.getTimeslot();
    },
    data(){
        return {
            timeslot: {}
        }
    },
    methods: {
        getTimeslot(){
            axios.get('getTimeslot/' + this.$route.params.id).then(response => {
                this.timeslot = response.data;
                //console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },
         update(){
            var d1 = new Date(this.timeslot.start_date).getTime();
            var d2 = new Date(this.timeslot.end_date).getTime();

            if(d1 > d2){
                alert('Start date must be before end date');
                return;
            }

            if(this.timeslot.start_time > this.timeslot.end_time){
                alert('Start time must be before end time');
                return;
            }
             axios.post('update/' + this.$route.params.id, this.timeslot).then( response => {
                 console.log('updated');
                 this.$router.push('/');
             })
             .catch( error => {
                 console.log(error);
             })
         }
    }
}
</script>

<style>

</style>