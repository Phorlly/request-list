let tables = []
const modalDialog = $(".dialog-modal")
const save = $(".save")
const update = $(".update")
const fullName = $(".name")
const email = $(".email")
const password = $(".password")
const role = $(".role")
const formId = $("#id")

$(".add").on("click", () => {
    clear()
    color()
    modalDialog.modal("toggle")
})

const reads = () => {
    tables = $(".table").DataTable({
        ajax: {
            url: "/api/users",
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
                title: "Gender",
                data: "gender",
                render: (row) => formatGender(row),
            },
            {
                title: "Phone Number",
                data: "phone",
            },
            {
                title: "Email Address",
                data: "email",
            },
            {
                title: "Role Permissions",
                data: "role",
                render: row => formatRoles(row),
            },
            {
                title: "Current Address",
                data: "address",
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
        url: `users/${id}`,
        method: "GET",
        whenComplete: (res) => {
            clear()
            save.hide()
            update.show()
            formId.val(res.id)
            fullName.val(res.name)
            email.val(res.email)
            role.val(res.role)
            $('.gender').val(res.gender)
            $('.phone').val(res.phone)
            $('.address').val(res.address)
            $('.noted').val(res.noted)
            modalDialog.modal('toggle')
        }
    })
}

save.on('click', () => {
    check() ? crud({
        url: `users`,
        method: "POST",
        dataForm: $('#data-form').serialize(),
        whenComplete: (res) => {
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
        url: `users/${formId.val()}`,
        method: "PUT",
        dataForm: $('#data-form').serialize(),
        whenComplete: (res) => {
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
            url: `users/${formId.val()}`,
            method: "DELETE",
            whenComplete: (res) => {
                tables.ajax.reload()
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
        })
    }).catch((err) => console.log(err.message))
}

const clear = () => {
    save.show()
    update.hide()
    fullName.val('')
    password.val('')
    email.val('')
    role.val('-1')
    $('.address').val('')
    $('.noted').val('')
    $('.phone').val('')
    $('.gender').val('0')
}

const color = () => {
    fullName.css("border-color", "#cccccc")
    email.css("border-color", "#cccccc")
    role.css("border-color", "#cccccc")
    password.css("border-color", "#cccccc")
}

const check = () => {
    let isValid = true
    if (fullName.val() === "") {
        Swal.fire({
            title: 'Input your fullname',
            icon: "warning",
            showConfirmButton: false,
            timer: 1000
        })
        fullName.css("border-color", "red")
        fullName.focus()
        isValid = false
    } else {
        fullName.css("border-color", "#cccccc")
        if (email.val() === "") {
            Swal.fire({
                title: 'Input your email address',
                icon: "warning",
                showConfirmButton: false,
                timer: 1000
            })
            email.css("border-color", "red")
            email.focus()
            isValid = false
        } else {
            email.css("border-color", "#cccccc")
            if (role.val() === "-1") {
                Swal.fire({
                    title: 'Select your role',
                    icon: "warning",
                    showConfirmButton: false,
                    timer: 1000
                })
                role.css("border-color", "red")
                isValid = false
            } else {
                role.css("border-color", "#cccccc")
                if (password.val() === "-1") {
                    Swal.fire({
                        title: 'Input your password',
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 1000
                    })
                    password.css("border-color", "red")
                    password.focus()
                    isValid = false
                } else {
                    password.css("border-color", "#cccccc")
                }
            }
        }
    }

    return isValid
}
