Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: false,
            maxFilezise: 10,
            maxFiles: 1,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                    location.reload();
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };