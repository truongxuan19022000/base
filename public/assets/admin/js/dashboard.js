$(function () {
 buildChart(element, data, label, null)
});

function routeUserId(id) {
    window.location.href = `/users/${id}`
}

function createUser() {
    window.location.href = `/users/create`
}

function indexUser() {
    window.location.href = `/users`
}

function deleteUser(id) {
    $.ajax({
        type:'DELETE',
        url:'/users/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data) {
            alert('success !!!');
            indexUser();
        }, error: function (e) {
            alert('error');
        }
    });
}
//
// function addUser(id) {
//     var data = $('#editUser').serializeArray();
//     $.ajax({
//         type:'POST',
//         url:'/users',
//         data: data,
//         dataType: 'json',
//         success:function(data) {
//             $("#msg").html(data.msg);
//             indexUser()
//         }, error: function (data) {
//             var errors = data.responseJSON;
//             alert(errors.mess);
//         }
//     });
// }
//
// function updateUser(id) {
//     var data = $('#editUser').serializeArray();
//     $.ajax({
//         type:'PUT',
//         url:'/users/' + id,
//         data: data,
//         dataType: 'json',
//         success:function(data) {
//             alert('update success !!!');
//             indexUser()
//         }, error: function () {
//             alert('error');
//         }
//     });
// }
//
// function search() {
//     var data = $('#search').serializeArray();
//     $.ajax({
//         type:'GET',
//         url:'/users',
//         data: data,
//         dataType: 'json',
//         success:function(data) {
//         }, error: function () {
//         }
//     });
// }

