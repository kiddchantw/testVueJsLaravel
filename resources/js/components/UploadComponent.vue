<template>
<div class="container" style="margin-top: 50px;">
    <h3> m1 ok</h3>

    <div class="text-center">
        <h4>File Upload with VueJS and Laravel 2</h4><br>
        <div style="max-width: 500px; margin: 0 auto;">
            <div v-if="success !== ''" class="alert alert-success" role="alert">
                {{success}}
            </div>
            <form @submit="submitForm" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="custom-file col-8" >
                        <input type="file" name="filename" class="custom-file-input" id="inputFileUpload" v-on:change="onFileChange">
                        <label class="custom-file-label" for="inputFileUpload">Choose file</label>
                    </div>
                    <div class="input-group-append col-4">
                        <input type="submit" class="btn btn-primary" value="Upload">
                    </div>
                </div>
                <br>
                <p class="text-danger font-weight-bold">{{filename}}</p>
            </form>
        </div>
    </div>

    <h3> m2 fail </h3>
    <div>
        <FileButton style="width:100px" @select="onFileSelect($event)">Select a file</FileButton>
        <p v-if="filename">You selected: {{filename}}</p>
        <br>
        <br>
        <br>
        <p>格式檢查結果:</p>
        <LinkButton iconCls="icon-save" @click="submitForm($event)"> Save </LinkButton>

        <input type="submit" class="btn btn-primary" value="Upload">

    </div>
</div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            filename: '',
            file: '',
            success: ''
        };
    },

    methods: {
         onFileSelect(event) {
            this.filename = event[0].name;
            this.file = event.target.file;
        },
        onFileChange(e) {
            //console.log(e.target.files[0]);
            this.filename = "Selected File: " + e.target.files[0].name;
            this.file = e.target.files[0];
        },
        submitForm(e) {
            e.preventDefault();
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            }

            // form data
            let formData = new FormData();
            formData.append('file', this.file);

            // send upload request
            axios.post('/uploadfile', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                    currentObj.filename = "";
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
        }
    }
}
</script>
