let tables = [];
const modalDialog = $(".dialog-modal")
const save = $(".save")
const update = $(".update")
const user = $(".user_id")
const departments = $(".department_ids")

$(".add").on("click", () => {
    clear()
    color()
    modalDialog.modal("toggle")
})

const reads = () => {
    tables = $(".table").DataTable({
        ajax: {
            url: "/api/user-departments",
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
                data: "user.name",
            },
            {
                title: "Gender",
                data: "user.gender",
                render: row => formatGender(row),
            },
            {
                title: "Role Permissions",
                data: "user.role",
                render: row => formatRoles(row),
            },
            {
                title: "Department",
                data: "departments",
                render: departments => {
                    let departmentNames = departments.map(department => department.name).join(', ');
                    return departmentNames;
                },
            },
            {
                title: "Short Name",
                data: "departments",
                render: departments => {
                    let shortNames = departments.map(department => department.short).join(', ');
                    return shortNames;
                },
            },
            {
                title: "Actions",
                data: "user.id",
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
        url: `users/${id}/departments`,
        method: "GET",
        whenComplete: res => {
            clear()
            save.hide()
            update.show()
            user.val(res.id)
            let departmentIds = res.departments.map(department => department.id);
            departments.val(departmentIds)
            modalDialog.modal('toggle')
        }
    })
}

save.on('click', () => {
    check() ? crud({
        url: `users/departments`,
        method: "POST",
        dataForm: $('#data-form').serializeArray(),
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
        url: `users/departments`,
        method: "POST",
        dataForm: $('#data-form').serializeArray(),
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
            url: `users/${id}/departments`,
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
    user.val('-1')
    departments.val('selected', false)
}

const color = () => {
    user.css("border-color", "#cccccc")
    departments.css("border-color", "#cccccc")
}

const check = () => {
    let isValid = true
    if (user.val() === "-1") {
        Swal.fire({
            title: 'Select the from user',
            icon: "warning",
            showConfirmButton: false,
            timer: 1000
        })
        user.css("border-color", "red")
        user.focus()
        isValid = false
    } else {
        user.css("border-color", "#cccccc")
        if (departments.val() === null || departments.val().length === 0) {
            Swal.fire({
                title: 'Select to departments',
                icon: "warning",
                showConfirmButton: false,
                timer: 1000
            })
            departments.css("border-color", "red")
            departments.focus()
            isValid = false
        } else {
            departments.css("border-color", "#cccccc")
        }
    }

    return isValid
}
