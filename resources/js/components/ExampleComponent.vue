<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header create-wrap">
                        <h5 class="float-left"> Peek Timeslot</h5>
                        <router-link class="btn btn-primary float-right create-btn" to="/create">Create</router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(timeslot, index) in timeslots" :key="index">
                                    <td>{{ timeslot.id }}</td>
                                    <td>{{ timeslot.title }}</td>
                                    <td>{{ timeslot.start_date }}</td>
                                    <td>{{ timeslot.end_date }}</td>
                                    <td>{{ timeslot.start_time | formatTime }}</td>
                                    <td>{{ timeslot.end_time | formatTime}}</td>
                                    <td>
                                        <router-link :to="{name: 'edit', params : {id: timeslot.id}}" class="btn btn-warning">Edit</router-link>
                                        <a @click.prevent="deleteTimeslot(timeslot.id)" class="btn btn-danger">Cancel</a>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
 import moment from 'moment';
    
    export default {
        data() {
            return {
                timeslots: {},
            }
        },
        methods: {
            
            getTimeslots() {
                axios.get('index')
                    .then(response => {
                        this.timeslots = response.data;
                        // console.log(response.data);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            deleteTimeslot(timeslot_id){
                axios.post('timeslot/delete/' + timeslot_id)
                    .then(response => {
                        this.getTimeslots();
                        //console.log(response);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
        filters: {
            formatTime(time) {
                let formatted_time = moment.utc(time, "HH:mm");
                return formatted_time.format('h:mm a');
            },
        },
        mounted() {
            this.getTimeslots();
        }
    }
</script>
