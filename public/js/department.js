let tables = []
const modalDialog = $(".dialog-modal")
const save = $(".save")
const update = $(".update")
const fullName = $(".name")
const shortName = $(".short")
const formId = $("#id")

$(".add").on("click", () => {
    clear()
    color()
    modalDialog.modal("toggle")
})

const reads = () => {
    tables = $(".table").DataTable({
        ajax: {
            url: "/api/departments",
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
                title: "Full Name",
                data: "name",
            },
            {
                title: "Short Name",
                data: "short",
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
        url: `departments/${id}`,
        method: "GET",
        whenComplete: res => {
            clear()
            save.hide()
            update.show()
            formId.val(res.id)
            fullName.val(res.name)
            shortName.val(res.short)
            $('.noted').val(res.noted)
            modalDialog.modal('toggle')
        }
    })
}

save.on('click', () => {
    check() ? crud({
        url: "departments",
        method: "POST",
        dataForm: $('#data-form').serialize(),
        whenComplete: res => {
            tables.ajax.reload()
            clear()
            success(res.message)
            // modalDialog.modal('toggle')
        }
    }) : false
})

update.on('click', () => {
    check() ? crud({
        url: `departments/${formId.val()}`,
        method: "PUT",
        dataForm: $('#data-form').serialize(),
        whenComplete: res => {
            tables.ajax.reload()
            clear()
            success(res.message)
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
            url: `departments/${id}`,
            whenComplete: res => {
                tables.ajax.reload()
                success(res.message)
            }
        }) : param.dismiss === Swal.DismissReason.cancel &&
        warning("The record is safty!")
    }).catch((err) => console.log(err.message))
}

const clear = () => {
    save.show()
    update.hide()
    fullName.val('')
    shortName.val('')
    $('.noted').val('')
}

const color = () => {
    fullName.css("border-color", "#cccccc")
    shortName.css("border-color", "#cccccc")
}

const check = () => {
    let isValid = true
    if (fullName.val() === "") {
        warning('Input the full name')
        fullName.css("border-color", "red")
        fullName.focus()
        isValid = false
    } else {
        fullName.css("border-color", "#cccccc")
        if (shortName.val() === "") {
            warning('Input the short name')
            shortName.css("border-color", "red")
            shortName.focus()
            isValid = false
        } else {
            shortName.css("border-color", "#cccccc")
        }
    }

    return isValid
}
