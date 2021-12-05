<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                <form @submit.prevent="create">

                
                    <div class="card-header">
                        <h5>Create a Timeslot</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" v-model="formData.title" maxlength="20" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" name="start_date" v-model="formData.start_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" name="end_date" v-model="formData.end_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control" name="start_time" v-model="formData.start_time" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" name="end_time" v-model="formData.end_time" required>
                        </div>
                        <div class="form-group mb-3" >
                            <input type="hidden" class="form-control" name="cancel_state" v-model="formData.cancel_state">
                        </div>

                        <hr>
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create</button>
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
    data(){
        return {
            formData: {
                title: '',
                start_date: '',
                end_date: '',
                start_time: '',
                end_time: '',
                cancel_state: 0,
            }
        }
    },
    methods: {
         create(){
            var d1 = new Date(this.formData.start_date).getTime();
            var d2 = new Date(this.formData.end_date).getTime();

            if(d1 > d2){
                alert('Start date must be before end date');
                return;
            }
    
            if(this.formData.start_time > this.formData.end_time){
                alert('Start time must be before end time');
                return;
            }
             axios.post('create', this.formData).then( response => {
                 console.log('created');
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