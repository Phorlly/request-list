let tables = [];
const modalDialog = $(".dialog-modal")
const save = $(".save")
const update = $(".update")
const leave = $(".leave_id")
const started = $(".started")
const ended = $(".ended")

$(".add").on("click", () => {
    clear()
    color()
    modalDialog.modal("toggle")
})

const reads = () => {
    tables = $(".table").DataTable({
        ajax: {
            url: `/api/mission/all/${info}`,
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
            // {
            //     data: "id",
            //     render: row => {
            //         return `<div> 
            //                     <button onclick= "read('${row}')" class= 'btn btn-warning btn-sm' >
            //                         <span class='fas fa-edit'></span>
            //                     </button>
            //                     <button onclick= "remove('${row}')" class= 'btn btn-danger btn-sm' >
            //                         <span class='fas fa-trash-alt'></span>
            //                     </button>
            //                 </div>`
            //     },
            // },
        ],
    })
}
reads()

const read = (id) => {
    crud({
        url: `request-lists/${id}`,
        method: 'GET',
        whenComplete: (res) => {
            clear()
            save.hide()
            update.show()
            formId.val(res.id)
            user.val(res.user)
            leave.val(res.leave_id)
            $('.status').val(res.status)
            $('.noted').val(res.noted)
            started.val(res.started)
            ended.val(res.ended)
            modalDialog.modal('toggle')
        }
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
            success(res.message)
            modalDialog.modal('toggle')
        }
    }) : false
})

const clear = () => {
    save.show()
    update.hide()
    leave.val('-1')
    started.val('')
    ended.val('')
    $('.noted').val('')
}

const color = () => {
    leave.css("border-color", "#cccccc")
    started.css("border-color", "#cccccc")
    ended.css("border-color", "#cccccc")
}

const check = () => {
    let isValid = true

    if (leave.val() === "-1") {
        warning('Select the mission')
        leave.css("border-color", "red")
        leave.focus()
        isValid = false
    } else {
        leave.css("border-color", "#cccccc")
        if (started.val() === "") {
            warning('Select the from-date')
            started.css("border-color", "red")
            isValid = false
        } else {
            started.css("border-color", "#cccccc")
            if (ended.val() === "") {
                warning('Select the to-date')
                ended.css("border-color", "red")
                isValid = false
            } else {
                ended.css("border-color", "#cccccc")
            }
        }
    }

    return isValid
}
