<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">vue js test</div>
                    <div class="card-body">
                        
                         <p> getUser: {{ users }} </p>

                        <p id="success"></p>
                      

                        <button type="button" @click="prompt">click</button>
                        <p>{{ msg }}</p>

<!-- 
                        <div id = "app">
                             <input tpye ="text"  v-model="message" placeholder="edit me">
                            <p> Message is: {{ message }} </p>
                        </div> -->

                        <input type="text" class="form-control" id="alt-image" v-model="text_A">
                        <p>{{ text_A }}</p>


                        <p>post example </p>
                        <form @submit.prevent="addNewPost">
                            <input type="text" name="title" v-model="newPost">
                            <input type="submit" value="Submit">
                        </form>

                        <br><br><br>
                        <p>DataGrid example </p>

                        <div>

                        <!-- <DataGrid :data="data" style="height:250px" > -->
                        <!-- <DataGrid style="height:600px; font-size:12px;" :pagination="true" :lazy="true" :data="data"> -->
 
                            <!-- <GridColumn field="itemid" title="Item ID"></GridColumn>
                            <GridColumn field="name" title="Name"></GridColumn>
                            <GridColumn field="listprice" title="List Price" align="right"></GridColumn>
                            <GridColumn field="unitcost" title="Unit Cost" align="right"></GridColumn>
                            <GridColumn field="attr" title="Attribute" width="30%"></GridColumn>
                            <GridColumn field="status" title="Status" align="center"></GridColumn>
                        </DataGrid> --> 
                        <!-- <form @submit.prevent="newGrid">
                            <input type="submit" value="Submit">
                        </form> -->
                        <div>
                            <h2>Row Group</h2>
                            <DataGrid :data="data" groupField="code" style="height:250px">
                                <GridColumnGroup :frozen="true" align="left" width="200">
                                    <GridHeaderRow>
                                        <GridColumn :cellCss="headerStyle" width="30"></GridColumn>
                                        <GridColumn field="itemid" title="Item ID"></GridColumn>
                                        <GridColumn field="name" title="Name"></GridColumn>
                                    </GridHeaderRow>
                                </GridColumnGroup>
                                <GridColumn field="listprice" title="List Price" align="right"></GridColumn>
                                <GridColumn field="unitcost" title="Unit Cost" align="right"></GridColumn>
                                <GridColumn field="attr" title="Attribute" width="30%"></GridColumn>
                                <GridColumn field="status" title="Status" align="center"></GridColumn>
                                <!-- <template slot="group" slot-scope="scope" >
                                    <span style="font-weight:bold">
                                        {{scope.value}} - <span style="color:red">{{scope.rows.length}}</span> Item(s)
                                    </span>
                                </template> -->
                            </DataGrid>
                        </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    // var app = new Vue ({
    //     el: "#app",
    //     data :{
    //         message: "hello"
    //     }
    // });

    export default {
        
        data() {
            return {
              users: {},
              msg: 'first',
              text_A: null,
              newPost: '',

            //   data = [{
            //         code: "FI-SW-01",
            //         name: "Koi",
            //         unitcost: 10.0,
            //         status: "P",
            //         listprice: 36.5,
            //         attr: "Large",
            //         itemid: "EST-1"
            //       },{
            //         code: "K9-DL-01",
            //         name: "Dalmation",
            //         unitcost: 12.0,
            //         status: "P",
            //         listprice: 18.5,
            //         attr: "Spotted Adult Female",
            //         itemid: "EST-10"
            //       }],

            //   data :[
            //         {"code":"FI-SW-01","name":"Koi","unitcost":10.00,"status":"P","listprice":36.50,"attr":"Large","itemid":"EST-1"},
            //         {"code":"K9-DL-01","name":"Dalmation","unitcost":12.00,"status":"P","listprice":18.50,"attr":"Spotted Adult Female","itemid":"EST-10"},
            //         {"code":"RP-SN-01","name":"Rattlesnake","unitcost":12.00,"status":"P","listprice":38.50,"attr":"Venomless","itemid":"EST-11"},
            //         {"code":"RP-SN-01","name":"Rattlesnake","unitcost":12.00,"status":"P","listprice":26.50,"attr":"Rattleless","itemid":"EST-12"},
            //         {"code":"RP-LI-02","name":"Iguana","unitcost":12.00,"status":"P","listprice":35.50,"attr":"Green Adult","itemid":"EST-13"},
            //         {"code":"FL-DSH-01","name":"Manx","unitcost":12.00,"status":"P","listprice":158.50,"attr":"Tailless","itemid":"EST-14"},
            //         {"code":"FL-DSH-01","name":"Manx","unitcost":12.00,"status":"P","listprice":83.50,"attr":"With tail","itemid":"EST-15"},
            //         {"code":"FL-DLH-02","name":"Persian","unitcost":12.00,"status":"P","listprice":23.50,"attr":"Adult Female","itemid":"EST-16"},
            //         {"code":"FL-DLH-02","name":"Persian","unitcost":12.00,"status":"P","listprice":89.50,"attr":"Adult Male","itemid":"EST-17"},
            //         {"code":"AV-CB-01","name":"Amazon Parrot","unitcost":92.00,"status":"P","listprice":63.50,"attr":"Adult Male","itemid":"EST-18"}
            //     ],
            }
        },
        methods: {
            // newGrid(){
            //     this.data =  
            // },


            getUser(){
                axios.get('/userlist')
                     .then((response)=>{
                        console.log('userlist - getUser() Response : ', response)
                        this.users = response.data.users
                     })
            },

            prompt() {
                this.msg = 'second';
            },

            addNewPost(){
                axios.post('/testRequest',{title: this.newPost})
                .then((response)=>{
                     $('#success').html(response.data.message)
                })
            },
        },
        created() {
            this.getUser()
        },        
    }
</script>