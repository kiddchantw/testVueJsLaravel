<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">vue js test </div>
                <div class="card-body">

                    <h2>Basic ComboTree</h2>
                    <ComboTree :data="dataComboTreeOneMonth" placeholder="顯示排除日期">
                        <!--v-model="value"-->
                        <Tree slot="tree"></Tree>
                    </ComboTree>

                    <br>
                    <br>
                    <br>

                    <h2>Basic SideMenu</h2>
                    <LinkButton @click="toggle()">顯示排除日期</LinkButton>
                    <!--style="margin-bottom:20px"-->
                    <SideMenu :style="{width:width+'px'}" :data="menus" :collapsed="collapsed" @selectionChange="selection=$event" :hidden="menusShow">
                    </SideMenu>

                    <br>
                    <br>
                    <br>

                    <p> get User: {{ users }} </p>

                    <p id="success"></p>

                    <button type="button" @click="prompt">click</button>
                    <p>{{ msg }}</p>

                    <br><br><br>
                    <h2>real time text</h2>
                    <input type="text" class="form-control" id="alt-image" v-model="text_A">
                    <p>{{ text_A }}</p>

                    <h2>post example </h2>
                    <form @submit.prevent="addNewPost">
                        <input type="text" name="title" v-model="newPost">
                        <input type="submit" value="Submit">
                    </form>
                    <br><br><br>

                    <h2>TagBox with Autocomplete</h2>
                    <TagBox v-model="value" style="width:300px;" valueField="id" textField="text" placeholder="Select a Language" :limitToList="true" :hasDownArrow="true" :data="data2"></TagBox>
                    <p v-if="value">{{value}}</p>

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

                    <h2>easy UI table v2</h2>
                    <!-- <LinkButton btnCls="c2" style="width:120px" @click="testGrid " > click</LinkButton> -->

                    <LinkButton iconCls="icon-search" :plain="true" @click="testGrid ">click</LinkButton>
                    <LinkButton iconCls="icon-reload" :plain="true" @click="getTable">Reload</LinkButton>
                    <LinkButton iconCls="icon-reload" :plain="true" @click="stopLoading">stopLoading</LinkButton>

                    <!-- <button type="button" @click="testGrid">click</button>
                    <button type="button" @click="getTable">reload</button> -->

                    <div>
                        <DataGrid :data="data" style="height:250px" :clickToEdit="true" selectionMode="cell" editMode="cell" :pagination="true" :pageSize="pageSize" :pageLayout="pageLayout" :loading="loading">
                            >
                            <GridColumn align="center" cellCss="datagrid-td-rownumber" width="30">
                                <template slot="body" slot-scope="scope">
                                    {{scope.rowIndex + 1}}
                                </template>
                            </GridColumn>
                            <GridColumn field="itemid" title="Item ID" width="10%"></GridColumn>
                            <GridColumn field="name" title="Name" width="10%" :editable="true" :editRules="['required','length[3,15]']"></GridColumn>

                            <GridColumn field="listprice" title="List Price" align="right" width="10%" :editable="true">
                                <template slot="edit" slot-scope="scope">
                                    <NumberBox v-model="scope.row.listprice" :precision="1"></NumberBox>
                                </template>
                            </GridColumn>
                            <GridColumn field="unitcost" title="Unit Cost" align="right" width="10%" :editable="true">
                                <template slot="edit" slot-scope="scope">
                                    <NumberBox v-model="scope.row.unitcost"></NumberBox>
                                </template>

                            </GridColumn>

                            <GridColumn field="attr" title="Attribute" width="10%"></GridColumn>

                            <GridColumn field="status" title="Status" align="center" width="10%">
                            </GridColumn>

                            <GridColumn field="link" title="link" align="center" data-options="field:'id', width:100, formatter: operation">
                                <!--基本作法-->
                                <!-- <template slot="body">  -->
                                <!-- <a href="https://www.youtube.com/" target="_blank">open</a> -->

                                <!--  <a href= data.item.link target="_blank">open</a><br>-->

                                <!-- </template> -->
                                <!--動態作法-->
                                <template slot="body" slot-scope="data">
                                    <!-- <b-link slo:href="data.item.link">link</b-link>  -->
                                    <a :href="data.row.link" target="_blank">open</a>
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

                    <br><br><br>
                    <h2>VuejsDatatableFactory table example 未完成</h2>
                    <div class="card-body" border="1">
                        <datatable :columns="columns" :data="rows"></datatable>
                        <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {
    VuejsDatatableFactory
} from 'vuejs-datatable';

function planUrl() {
    return '<a target="_blank" href="https://www.youtube.com/"></a>';

}

function formatDetail(value, row) {
    var href = 'get_details.php?userid=' + row.id;
    return '<a target="_blank" href="' + href + '">View Detail</a>';
}

function operation(value, row, index) {
    return "<a href='" + row.id + "' target='_blank'>Cell Link Name</a>";
}
// // function operation(value, row, index)
// // {
// //     val =  d 
// //     // return '<a href="'https://www.google.com/?hl=zh_tw'">Cell Link Name'</a>"';
// //     return '<a href="'+url + row.customer_id+'">'+val+'</a>';

// }

export default {

    components: {
        VuejsDatatableFactory
    },
    mounted() {
        console.log('Component mounted.')
    },

    data() {
        return {
            loading: true,
            columns: [{
                    label: 'id',
                    field: 'id'
                },
                {
                    label: 'Title',
                    field: 'title'
                },
                {
                    label: 'Slug',
                    field: 'slug'
                }
            ],
            rows: [{
                'id': 1,
                'Title': 'title'
            }],
            page: 1,
            per_page: 10,
            users: {},
            msg: 'first',
            text_A: null,
            newPost: '',
            data: null,
            pageSize: 3,
            pageLayout: ['list', 'first', 'prev', 'next', 'last', 'refresh', 'info'],
            value: ["3"],
            data2: [{
                    id: "1",
                    text: "Java"
                },
                {
                    id: "2",
                    text: "C#"
                },
                {
                    id: "3",
                    text: "Ruby"
                },
                {
                    id: "4",
                    text: "Perl"
                },
                {
                    id: "5",
                    text: "Basic"
                }
            ],
            width: 200,
            menusShow: true,
            collapsed: false,
            selection: null,
            menus: [{
                    text: "2020-09",
                    iconCls : "icon-mini-edit",
                    state: "open",
                    children: [{
                            text: "2020-09-01"
                        },
                        {
                            text: "2020-09-02"
                        },
                        {
                            text: "2020-09-03"
                        }
                    ]
                },
                {
                    text: "2020-12",
//                    iconCls:"icon-mini-edit",
                    iconCls:"icon-blank",
                    state: "open",
                    children: [{
                            text: "2020-12-01"
                        },
                        {
                            text: "2020-12-02"
                        }
                    ]
                }

            ],
            dataComboTreeOneMonth: [
                { text: "2020-09-01"},
                { text: "2020-09-02"},
            ],
            dataComboTree: [
                {
                    text: "2020-09",
                    children: [{
                            text: "2020-09-01"
                        },
                        {
                            text: "2020-09-02"

                        },
                        {
                            text: "2020-09-03"
                        },
                    ],
                },
                {
                    text: "2020-12",
                    children: [{
                        text: "2020-12-03"
                    }, ],
                },
            ],
        }
    },
    methods: {
        toggle() {
            this.menusShow = !this.menusShow;
            // this.collapsed = !this.collapsed;
            this.width = this.collapsed ? 50 : 200;
        },
        stopLoading() {
            this.loading = false
        },
        getTable() {
            this.data = [{
                    "code": "FI-SW-01",
                    "name": "Koi",
                    "unitcost": 10.00,
                    "status": "P",
                    "listprice": 36.50,
                    "attr": "Large",
                    "itemid": "EST-1",
                    "link": "https://www.youtube.com/"
                },
                {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                },
                {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://www.apple.com/"
                }, {
                    "code": "K9-DL-01",
                    "name": "Dalmation",
                    "unitcost": 12.00,
                    "status": "P",
                    "listprice": 18.50,
                    "attr": "Spotted Adult Female",
                    "itemid": "EST-10",
                    "link": "https://translate.google.com/"
                },
                // {"code":"RP-SN-01","name":"Rattlesnake","unitcost":12.00,"status":"P","listprice":38.50,"attr":"Venomless","itemid":"EST-11"},
                // {"code":"RP-SN-01","name":"Rattlesnake","unitcost":12.00,"status":"P","listprice":26.50,"attr":"Rattleless","itemid":"EST-12"},
                // {"code":"RP-LI-02","name":"Iguana","unitcost":12.00,"status":"P","listprice":35.50,"attr":"Green Adult","itemid":"EST-13"},
                // {"code":"FL-DSH-01","name":"Manx","unitcost":12.00,"status":"P","listprice":158.50,"attr":"Tailless","itemid":"EST-14"},
                // {"code":"FL-DSH-01","name":"Manx","unitcost":12.00,"status":"P","listprice":83.50,"attr":"With tail","itemid":"EST-15"},
                // {"code":"FL-DLH-02","name":"Persian","unitcost":12.00,"status":"P","listprice":23.50,"attr":"Adult Female","itemid":"EST-16"},
                // {"code":"FL-DLH-02","name":"Persian","unitcost":12.00,"status":"P","listprice":89.50,"attr":"Adult Male","itemid":"EST-17"},
                // {"code":"AV-CB-01","name":"Amazon Parrot","unitcost":92.00,"status":"P","listprice":63.50,"attr":"Adult Male","itemid":"EST-18"}
            ]
        },
        getUser() {
            axios.get('/userlist')
                .then((response) => {
                    console.log('userlist - getUser() Response : ', response)
                    this.users = response.data.users
                })
        },
        prompt() {
            this.msg = 'second';
        },
        addNewPost() {
            axios.post('/testRequest', {
                    title: this.newPost
                })
                .then((response) => {
                    $('#success').html(response.data.message)
                })
        },

        testGrid() {
            axios.get('/testGrid')
                .then((response) => {
                    console.log('testGrid Response : ', response.data.users)
                    this.data = response.data.users
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
