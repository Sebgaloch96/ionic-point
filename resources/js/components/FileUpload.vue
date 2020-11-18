<template>
    <div>                    
        <dropzone ref="dropzone" id="dropzone" class="form-control"
            :options="dropzoneOptions"
            @vdropzone-sending="onSending">
        </dropzone>
    </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    components: {
        Dropzone: vue2Dropzone
    },

    mounted () {
        this.csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
        this.dropzone = this.$refs.dropzone;
    },

    data() {
        return {
            dropzone: null,
            dropzoneOptions: {
                url: '/api/hub/files/upload',
                paramName: "files", // The name that will be used to transfer the file
                uploadMultiple: true,
                maxFiles: 10,
                maxFilesize: 10, // MB
                autoProcessQueue: false,
                thumbnailWidth: 300,
                addRemoveLinks: true,
                dictDefaultMessage: 'Drop files or click to upload',
                dictRemoveFile: '<i class="fas fa-minus-circle"></i> Remove'
            },
            dropzoneParams: {
                model_id: null,
                model_type: ''
            },
            csrf_token: null,
        }
    },

    methods: {
        upload(modelId, modelType) {
            this.dropzoneParams.model_id = modelId;
            this.dropzoneParams.model_type = modelType;
            this.dropzone.processQueue();
        },

        onSending(file, xhr, formData) {
            formData.append('_token', this.csrf_token);
            formData.append('additional_params', this.dropzoneParams);
        },
    }
 }
</script>