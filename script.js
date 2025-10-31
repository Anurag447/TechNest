// for registration
$("#submit").click(function (e) {
    e.preventDefault();
  var name = $("#name").val();
  var password = $("#password").val();
  var email = $("#email").val();

  if (name.length < 5 && name.trim() == "") {
    console.log(" ");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Enter Valid Name Atleast 4 character",
    });
  }
  if (password.length < 8 && password.trim() == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Password must be contain 8 letters",
    });
  }

  let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (email === "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Enter Your email",
    });
  } else if (!emailPattern.test(email)) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Enter Valid Email",
    });
  }

  $.ajax({
    type: "post",
    url: "admin/RegisterHandle.php",
    data: { name: name, email: email, password: password },
    success: function (response) {
      if (response == "true") {
        Swal.fire({
          title: "Registered Successfully!",
          icon: "success",
          draggable: true,
        });
      }
      else{
        console.log(response);
      }
    },
  });
});




