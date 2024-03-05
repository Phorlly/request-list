let csrfToken = $('meta[name="csrf-token"]').attr('content')
const statusAI = (status) => {
    const items = [
        { id: 1, name: "Active", color: "btn-warning" },
        { id: 2, name: "Inactive", color: "btn-danger" },
    ]
    const item = items.find(element => element.id === status)

    return `<span class="btn ${item.color} btn-sm rounded-5" style="cursor: default">${item.name}</span>`
}

const formatStatus = (status) => {
    const items = [
        { id: 1, name: "Pending...", color: "btn-dark" },
        { id: 2, name: "Approved √", color: "btn-warning" },
        { id: 0, name: "Rejected ×", color: "btn-danger" },
    ]

    const item = items.find(element => element.id === status)

    return `<span class="btn ${item.color} btn-sm rounded-5" style="cursor: default;">${item.name}</span>`
}

const formatRoles = (role) => {
    const items = [
        { id: 1, name: "Admin", color: "btn-primary" },
        { id: 2, name: "User", color: "btn-secondary" },
        { id: 3, name: "Team Leader", color: "btn-warning" },
        { id: 4, name: "CEO", color: "btn-info" },
        { id: 5, name: "CFO", color: "btn-success" },
        { id: 6, name: "HR Manager", color: "btn-dark" },
    ]

    const item = items.find(element => element.id === role)

    return `<span class="btn ${item.color} btn-sm rounded-5" style="cursor: default;">${item.name}</span>`
}

const formatType = (type) => {
    const items = [
        { id: 1, name: "Leave", color: "btn-secondary" },
        { id: 0, name: "Mission", color: "btn-danger" },
    ]

    const item = items.find(element => element.id === type)

    return `<span class="btn ${item.color} btn-sm rounded-5" style="cursor: default;">${item.name}</span>`
}

const formatGender = (gender) => {
    const items = [
        { id: 1, name: "Male", color: "btn-primary", icon: "fas fa-mars" },
        { id: 0, name: "Female", color: "btn-danger", icon: "fas fa-venus" },
    ]

    const item = items.find(element => element.id === gender)

    return `<span class="btn ${item.color} btn-sm rounded-5" style="cursor: default;">
                <i class="${item.icon}"></i> ${item.name}
            </span>`;
}
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500
})

const success = (message) => {
    Toast.fire({
        title: message,
        icon: "success",
    })
}

const warning = (message) => {
    Toast.fire({
        title: message,
        icon: "warning",
    })
}

const crud = ({ url, method, dataForm, whenComplete = (res) => { } }) => {
    $.ajax({
        url: `/api/${url}`,
        method: method,
        data: dataForm || null,
        headers: { 'X-CSRF-TOKEN': csrfToken },
        success: (res) => {
            // Check if response is null
            if (res === null) {
                // Handle null response
                console.log("Response is null")
            } else {
                // Handle non-null response
                whenComplete(res)
            }
        },
        error: (xhr) => {
            if (xhr.responseJSON && xhr.responseJSON.message) {
                Swal.fire({
                    title: xhr.responseJSON.message,
                    icon: "error",
                })
            } else {
                console.log(xhr.responseText)
            }
        },
    })
}
