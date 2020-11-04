<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <h2>dn_selector</h2>
                <Tabs>
                    <TabPanel :title="'單筆輸入'">
                        <br>
                        <div>
                            <LinkButton iconCls="icon-add">新增</LinkButton>
                            <LinkButton iconCls="icon-search" style="width:80px">查詢</LinkButton>
                            <LinkButton iconCls="icon-remove">刪除</LinkButton>
                            <LinkButton iconCls="icon-cut">修改</LinkButton>
                        </div>

                        <br>
                        <div>
                            <Form :model="user" :labelWidth="120" labelAlign="right" style="max-width:500px" @validate="errors=$event" :rules="rules">
                                <FormField name="dn" label="dn:">
                                    <TextBox v-model="user.dn"></TextBox>
                                </FormField>
                                <FormField name="naptr_id" label="naptr_id:">
                                    <TextBox v-model="user.naptr_id"></TextBox>
                                </FormField>

                                <FormField>
                                    <LinkButton :disabled="false" @click="submitForm()" style="width:100px">Submit</LinkButton>
                                </FormField>
                            </Form>
                        </div>
                            <p>{{user}}</p>


                    </TabPanel>
                    <TabPanel :title="'批次輸入'">
                        <br>
                        <h3> 請選擇您要上傳的檔案 </h3>
                        <div>
                            <FileButton style="width:100px" @select="onFileSelect($event)">Select a file</FileButton>
                            <p v-if="filename">You selected: {{filename}}</p>
                            <br>
                            <br>
                            <br>

                            <p>格式檢查結果:</p>
                            <LinkButton iconCls="icon-save">Save</LinkButton>

                        </div>
                    </TabPanel>
                    <TabPanel :title="'批次輸出'">
                        <br>
                        <h3> 請點選以下按鈕輸出檔案 </h3>
                        <LinkButton iconCls="icon-print" style="width:80px">export</LinkButton>
                    </TabPanel>
                </Tabs>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            filename: null,
            user: {
                dn: null,
                naptr_id: null
            },
            rules: {
                dn: "required",
                naptr_id: "required"

            },
            errors: {},
        };
    },
    methods: {
        onFileSelect(event) {
            this.filename = event[0].name;
        },
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
