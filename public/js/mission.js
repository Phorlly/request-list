let tables = [];
const modalDialog = $(".dialog-modal")
const save = $(".save")
const update = $(".update")
const user = $(".user_id")
const leave = $(".leave_id")
const started = $(".started")
const ended = $(".ended")
const formId = $("#id")

$(".add").on("click", () => {
    clear()
    color()
    modalDialog.modal("toggle")
})

const reads = () => {
    tables = $(".table").DataTable({
        ajax: {
            url: "/api/mission",
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
                data: "user.name",
            },
            {
                title: "Gender",
                data: "user.gender",
                render: (row) => formatGender(row),
            },
            {
                title: "Mission",
                data: "leave.name",
            },
            {
                title: "From-date",
                data: "started",
                render: row => moment(row).format("DD MMM YYYY"),
            },
            {
                title: "To-date",
                data: "ended",
                render: row => moment(row).format("DD MMM YYYY"),
            },
            {
                title: "Status",
                data: "status",
                render: row => formatStatus(row),
            },
            {
                title: "From-department",
                data: "user.departments",
                render: departments => {
                    let departmentNames = departments.map(department => department.name).join(', ');
                    return departmentNames;
                },
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
                            </div>`
                },
            },
        ],
    })
}
reads()
{/* <button onclick= "remove('${row}')" class= 'btn btn-danger btn-sm' >
<span class='fas fa-trash-alt'></span>
</button> */}

const read = (id) => {
    crud({
        url: `request-lists/${id}`,
        method: "GET",
        whenComplete: res => {
            clear()
            save.hide()
            update.show()
            formId.val(res.id)
            user.val(res.user_id)
            leave.val(res.leave_id)
            $('.status').val(res.status)
            $('.noted').val(res.noted)
            started.val(res.started)
            ended.val(res.ended)
            modalDialog.modal('toggle')
        },
    })
}

save.on('click', () => {
    check() ? crud({
        url: "request-lists",
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
        url: `request-lists/${formId.val()}`,
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
            url: `request-lists/${id}`,
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
    leave.val('-1')
    $('.status').val('1')
    started.val('')
    ended.val('')
    $('.noted').val('')
}

const color = () => {
    user.css("border-color", "#cccccc")
    leave.css("border-color", "#cccccc")
    started.css("border-color", "#cccccc")
    ended.css("border-color", "#cccccc")
}

const check = () => {
    let isValid = true

    if (user.val() === "-1") {
        Swal.fire({
            title: 'Select the name',
            icon: "warning",
            showConfirmButton: false,
            timer: 1000
        })
        user.css("border-color", "red")
        user.focus()
        isValid = false
    } else {
        user.css("border-color", "#cccccc")
        if (leave.val() === "-1") {
            Swal.fire({
                title: 'Select the mission',
                icon: "warning",
                showConfirmButton: false,
                timer: 1000
            })
            leave.css("border-color", "red")
            leave.focus()
            isValid = false
        } else {
            leave.css("border-color", "#cccccc")
            if (started.val() === "") {
                Swal.fire({
                    title: 'Select the from-date',
                    icon: "warning",
                    showConfirmButton: false,
                    timer: 1000
                })
                started.css("border-color", "red")
                isValid = false
            } else {
                started.css("border-color", "#cccccc")
                if (ended.val() === "") {
                    Swal.fire({
                        title: 'Select the to-date',
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 1000
                    })
                    ended.css("border-color", "red")
                    isValid = false
                } else {
                    ended.css("border-color", "#cccccc")
                }
            }
        }
    }

    return isValid
}
