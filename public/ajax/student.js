$(document).ready(function () {
  $(document).on("submit", "#student_save", function (e) {
    e.preventDefault();
    let data = $(this).serializeArray();

    $.each(data, function (i, message) {
      $("#" + message.name + "_error").html((message = ""));
    });
    $.ajax({
      url: "student",
      data: data,
      type: "POST",
      dataType: "json",
      success: function (response) {
        toastr.success("Student added successfully", "Success!");
        $("#addModal").modal("hide");
        loaddata();
        $("#student_save").trigger("reset");
      },
      error: function (error) {
        $.each(error.responseJSON, function (i, message) {
          $("#" + i + "_error").html(message[0]);
        });
      },
    });
  });

  $("#datalist").on("click", ".edit", function () {
    var data = $(this).attr("data");
    $.ajax({
      url: "student" + "/" + data + "/edit",
      type: "get",
      dataType: "json",
      success: function (response) {
        $("#edit_student_name").val(response.std_name);
        $("#edit_student_father_name").val(response.std_father_name);
        $("#edit_student_mother_name").val(response.std_mother_name);
        $("#edit_department_name").val(response.dept_name);
        $("#edit_blood_group").val(response.blood_group);
        $("#edit_birth_date").val(response.std_birth_date);
        $("#edit_student_id").val(response.id);
      },
    });
  });

  $("#datalist").on("click", ".show", function () {
    let data = $(this).attr("data");
    $.ajax({
      url: `/studentShow/${data}`,
      type: "get",
      dataType: "json",
      success: function (response) {
        console.log(response);
        $("#show_student_name").val(response.std_name);
        $("#show_father_name").val(response.std_father_name);
        $("#show_mother_name").val(response.std_mother_name);
        $("#show_department_name").val(response.dept_name);
        $("#show_blood_group").val(response.blood_group);
        $("#show_birth_date").val(response.std_birth_date);
      },
    });
  });

  $(document).on("submit", "#student_update", function (e) {
    e.preventDefault();
    var id = $("#edit_student_id").val();
    let data = $(this).serializeArray();

    $.each(data, function (i, message) {
      $("#" + message.name + "_edit").html((message = ""));
    });
    $.ajax({
      url: "student/" + id,
      data: data,
      type: "PUT",
      dataType: "json",
      success: function (response) {
        console.log(response);
        toastr.success("Student Updated successfully", "Success!");
        $("#edit_student").modal("hide");
        loaddata();
      },
      error: function (error) {
        $.each(error.responseJSON, function (i, message) {
          $("#" + i + "_edit").html(message[0]);
        });
      },
    });
  });

  $("#datalist").on("click", ".delete", function () {
    var data = $(this).attr("data");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "student/" + data,
          data: data,
          type: "delete",
          dataType: "json",
          success: function (response) {
            console.log(response);
            toastr.success("Student deleted successfully", "Success!");
            loaddata();
          },
        });
      }
    });
  });

  $("#datalist").on("click", ".page-link", function (e) {
    e.preventDefault();
    var pagelink = $(this).attr("href");
    console.log(pagelink);
    loaddata(pagelink);
  });

  $("#search").keyup(function () {
    loaddata();
  });

  loaddata();
});

function loaddata() {
  let dept = $("#filter_dept").val();
  console.log("dept", dept);
  let bloodgroup = $("#filter_blood").val();
  console.log("blood", bg);

  let page_link = `/student/create?dept=${dept ? dept : ""}&bg=${
    bloodgroup ? bloodgroup : ""
  }`;

  $.ajax({
    url: page_link,
    type: "get",
    datatype: "html",
    success: function (response) {
      $("#datalist").html(response);
    },
    error: function (error) {
      toastr.warning("Data not exist");
    },
  });
}
