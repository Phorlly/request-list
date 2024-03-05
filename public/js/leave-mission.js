let tables = [];
const modalDialog = $(".dialog-modal")
const save = $(".save")
const update = $(".update")
const fullName = $(".name")
const duration = $(".duration")
const formId = $("#id")

$(".add").on("click", () => {
    clear()
    color()
    modalDialog.modal("toggle")
})

const reads = () => {
    tables = $(".table").DataTable({
        ajax: {
            url: "/api/leaves",
            dataSrc: "",
            method: "GET",
        },
        responsive: true,
        destroy: true,
        // autoWidth: false,
        // scrollX: true,
        //dom: "Bfrtip",
        language: {
            paginate: {
                previous: "<i class='fas fa-chevron-left'>",
                next: "<i class='fas fa-chevron-right'>",
            },
        },
        columns: [
            {
                title: "#",
                data: null,
                render: (data, type, row, meta) => `${meta.row + 1}`,
            },
            {
                title: "Name",
                data: "name",
            },
            {
                title: "Leave",
                data: "is_leave",
                render: row => formatType(row),
            },
            {
                title: "Duration",
                data: "duration",
            },
            {
                title: "Description",
                data: "noted",
            },
            {
                title: "Created",
                data: "created_at",
                render: (row) => row ? moment(row).fromNow() : "",
            },
            {
                title: "Actions",
                data: "id",
                render: row => {
                    return `<div> 
                                <button onclick= "read('${row}')" class= 'btn btn-warning btn-sm' >
                                    <span class='fas fa-edit'></span>
                                </button>
                                <button onclick= "remove('${row}')" class= 'btn btn-danger btn-sm' >
                                    <span class='fas fa-trash-alt'></span>
                                </button>
                            </div>`
                },
            },
        ],
    })
}
reads()

const read = (id) => {
    crud({
        url: `leaves/${id}`,
        method: "GET",
        whenComplete: res => {
            clear()
            save.hide()
            update.show()
            formId.val(res.id)
            fullName.val(res.name)
            duration.val(res.duration)
            $('.noted').val(res.noted)
            modalDialog.modal('toggle')
        }
    })
}

save.on('click', () => {
    check() ? crud({
        url: "leaves",
        method: "POST",
        dataForm: $('#data-form').serialize(),
        whenComplete: res => {
            tables.ajax.reload()
            clear()
            Swal.fire({
                title: res.message,
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            })
            // modalDialog.modal('toggle')
        }
    }) : false
})

update.on('click', () => {
    check() ? crud({
        url: `leaves/${formId.val()}`,
        method: "PUT",
        dataForm: $('#data-form').serialize(),
        whenComplete: res => {
            tables.ajax.reload()
            clear()
            Swal.fire({
                title: res.message,
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            })
            modalDialog.modal('toggle')
        }
    }) : false
})

const remove = (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: 'Want to delete this record!',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: `<i class='fas fa-times-circle'></i> <span>Cance</span>`,
        confirmButtonText: `<i class='fas fa-trash'></i> <span>OK</span>`,
    }).then((param) => {
        param.value ? crud({
            method: "DELETE",
            url: `leaves/${id}`,
            whenComplete: res => {
                tables.ajax.reload();
                Swal.fire({
                    title: res.message,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        }) : param.dismiss === Swal.DismissReason.cancel &&
        Swal.fire({
            title: "The record is safty!",
            icon: "warning",
            showConfirmButton: false,
            timer: 1000
        });
    }).catch((err) => console.log(err.message));
}

const clear = () => {
    save.show()
    update.hide()
    $('.is_leave').val('1')
    fullName.val('')
    duration.val('')
    $('.noted').val('')
}

const color = () => {
    fullName.css("border-color", "#cccccc")
    duration.css("border-color", "#cccccc")
}

const check = () => {
    let isValid = true
    if (fullName.val() === "") {
        Swal.fire({
            title: 'Input the fullname',
            icon: "warning",
            showConfirmButton: false,
            timer: 1000
        })
        fullName.css("border-color", "red")
        fullName.focus()
        isValid = false
    } else {
        fullName.css("border-color", "#cccccc")
        if (duration.val() === "") {
            Swal.fire({
                title: 'Input the duration',
                icon: "warning",
                showConfirmButton: false,
                timer: 1000
            })
            duration.css("border-color", "red")
            duration.focus()
            isValid = false
        } else {
            duration.css("border-color", "#cccccc")
        }
    }

    return isValid
}
