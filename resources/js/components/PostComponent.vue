<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">vue js test</div>                 
                    <div class="card-body">
                        
                        <p> get User: {{ users }} </p>

                        <p id="success"></p>
                      

                        <button type="button" @click="prompt">click</button>
                        <p>{{ msg }}</p>

                        <input type="text" class="form-control" id="alt-image" v-model="text_A">
                        <p>{{ text_A }}</p>


                        <p>post example </p>
                        <form @submit.prevent="addNewPost">
                            <input type="text" name="title" v-model="newPost">
                            <input type="submit" value="Submit">
                        </form>

                        <br><br><br>
                        <h2>html table</h2>
                        <table border="1">
                            <thead>
                                <!-- <tr>
                                    <th colspan="2">The table header</th>
                                </tr> -->
                                 <tr>
                                    <!-- <td>id</td> -->
                                     <th data-options="field:'name',width:100,formatter:planUrl">id</th>      
                                    <!-- <td>title</td> -->
                                    <th data-options="field:'name',width:100,formatter:planUrl">title</th>      
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr> -->
                                    <!-- <td>id</td> -->
                                    <!-- <td>title</td> -->
                                <!-- </tr> --> 
                                <tr>
                                    <td>id</td>
                                    <td>abc</td>
                                </tr>
                            </tbody>
                        </table>

                        <br><br><br>

                        <h2>VuejsDatatableFactory  table example 未完成</h2>
                        <div class="card-body" border="1">
                            <datatable :columns="columns" :data="rows"></datatable>
                            <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                        </div>


                        <h2>easy UI table </h2>

                        <button type="button" @click="testGrid">click</button>
                        <button type="button" @click="getTable">reload</button>

                        <div>
                            <DataGrid :data="data" style="height:250px" :clickToEdit="true" selectionMode="cell" editMode="cell" >
                                <GridColumn field="itemid" title="Item ID" width="10%" ></GridColumn>
                                <GridColumn field="name" title="Name"  width="10%" :editable="true" :editRules="['required','length[3,15]']"></GridColumn>
                                
                                <GridColumn field="listprice" title="List Price" align="right"  width="10%" :editable="true">
                                    <template slot="edit" slot-scope="scope">
                                        <NumberBox v-model="scope.row.listprice" :precision="1"></NumberBox>
                                    </template>
                                </GridColumn>
                                <GridColumn field="unitcost" title="Unit Cost" align="right"  width="10%" :editable="true">
                                    <template slot="edit" slot-scope="scope">
                                        <NumberBox v-model="scope.row.unitcost"></NumberBox> 
                                    </template>

                                </GridColumn>

                                <GridColumn field="attr" title="Attribute" width="10%"></GridColumn>
                                
                                <GridColumn field="status" title="Status" align="center"  width="10%">
                                </GridColumn>

                                <GridColumn field="link" title="link" align="center" data-options="field:'id', width:100, formatter: operation">
                                    <template slot="body">
                                        <a href="https://www.youtube.com/" target="_blank">open</a><br>
                                    </template>
                                </GridColumn>
                               <!-- <th field ="detail" width = "120" formatter="formatDetail">Actions</th> -->
                            </DataGrid>
                        </div>
                        <br><br><br>
                        <a href="https://www.youtube.com/">這個連結會連到 YouTube</a><br>


                        <table class="easyui-datagrid" style="width:400px;height:250px" data-options="url:'datagrid_data.json',fitColumns:true,singleSelect:true">
                        <thead>   
                            <tr>    
                            <th data-options="field:'code',width:100">Code</th>         
                            <th data-options="field:'name',width:100,formatter:planUrl">Name</th>        
                            </tr>       
                        </thead>
                        <tbody>
                                <tr>
                                    <td>id</td>
                                    <td>abc</td>
                                </tr>
                            </tbody>
                    </table>
                    <a href="https://www.youtube.com/">這個連結會連到YouTube</a><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { VuejsDatatableFactory } from 'vuejs-datatable';

    function planUrl(){    
           return '<a target="_blank" href="https://www.youtube.com/"></a>';

    }

    function formatDetail(value,row){
		var href = 'get_details.php?userid='+row.id;
		return '<a target="_blank" href="' + href + '">View Detail</a>';
	}


    function operation(value, row, index)
    {
    return "<a href='" + row.id + "' target='_blank'>Cell Link Name</a>";
    }
    // // function operation(value, row, index)
    // // {
    // //     val =  d 
    // //     // return '<a href="'https://www.google.com/?hl=zh_tw'">Cell Link Name'</a>"';
    // //     return '<a href="'+url + row.customer_id+'">'+val+'</a>';

    // }


    export default {
        components: { VuejsDatatableFactory },
        mounted() {
            console.log('Component mounted.')
        },


        data() {
            return {
                columns: [
                        {label: 'id', field: 'id'}, 
                        {label: 'Title', field: 'title'},
                        {label: 'Slug', field: 'slug'}
                    ],
                rows: [
                    {'id':1,'Title':'title'}
                ],
                page: 1,
                per_page: 10,                
              users: {},
              msg: 'first',
              text_A: null,
              newPost: '',
              data : null,
            }
        },
        methods: {

            getTable(){
                this.data = [
                    {"code":"FI-SW-01","name":"Koi","unitcost":10.00,"status":"P","listprice":36.50,"attr":"Large","itemid":"EST-1"},
                    {"code":"K9-DL-01","name":"Dalmation","unitcost":12.00,"status":"P","listprice":18.50,"attr":"Spotted Adult Female","itemid":"EST-10"},
                    {"code":"RP-SN-01","name":"Rattlesnake","unitcost":12.00,"status":"P","listprice":38.50,"attr":"Venomless","itemid":"EST-11"},
                    {"code":"RP-SN-01","name":"Rattlesnake","unitcost":12.00,"status":"P","listprice":26.50,"attr":"Rattleless","itemid":"EST-12"},
                    {"code":"RP-LI-02","name":"Iguana","unitcost":12.00,"status":"P","listprice":35.50,"attr":"Green Adult","itemid":"EST-13"},
                    {"code":"FL-DSH-01","name":"Manx","unitcost":12.00,"status":"P","listprice":158.50,"attr":"Tailless","itemid":"EST-14"},
                    {"code":"FL-DSH-01","name":"Manx","unitcost":12.00,"status":"P","listprice":83.50,"attr":"With tail","itemid":"EST-15"},
                    {"code":"FL-DLH-02","name":"Persian","unitcost":12.00,"status":"P","listprice":23.50,"attr":"Adult Female","itemid":"EST-16"},
                    {"code":"FL-DLH-02","name":"Persian","unitcost":12.00,"status":"P","listprice":89.50,"attr":"Adult Male","itemid":"EST-17"},
                    {"code":"AV-CB-01","name":"Amazon Parrot","unitcost":92.00,"status":"P","listprice":63.50,"attr":"Adult Male","itemid":"EST-18"}
                ]
            },
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

            testGrid(){
                axios.get('/testGrid')
                     .then((response)=>{
                        console.log('testGrid Response : ', response.data.users)
                        this.data =  response.data.users
                     })
            },
        },
        created() {
            this.getUser(),
            // this.getPosts()
            this.getTable()
        },        
    }
</script>