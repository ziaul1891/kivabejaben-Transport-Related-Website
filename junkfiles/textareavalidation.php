
<head>
<script>
function checkData() {
  var txtCheck = document.formName;
    if(txtCheck.textarea.value == "")  {
      alert("Please enter information in the textarea");
      txtCheck.textarea.focus();
      return false;
    }
}
</script>
</head>
<body>
<form name="formName" method="post" action="" onSubmit="return checkData();">   
    <textarea name="textarea"></textarea>
  </p>  <p>
    <input name="Submit" type="submit" value="Submit">
  </p>
</form>
</body>