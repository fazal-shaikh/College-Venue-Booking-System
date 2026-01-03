function itoggle()
{
  var ps=document.getElementById('psw');
  var ic=document.getElementById('eye');
  if(ps.type=="password")
  {
    ps.type="text";
    ic.className="fa fa-eye"
  }
  else
    {
      ps.type="password";
      ic.className="fa fa-eye-slash"
    }
  }
  function itoggle2()
  {
    var cps=document.getElementById('cpsw');
    var ic2=document.getElementById('eye2');
    if(cps.type=="password")
    {
      cps.type="text";
      ic2.className="fa fa-eye"
    }
    else
      {
        cps.type="password";
        ic2.className="fa fa-eye-slash"
      }
    }
    function len(){
      var p=document.getElementById("psw");
      if(p.value.length<=8)
      {   document.getElementById("len").style.visibility="visible";
        document.getElementById("len").innerHTML="*Password must be atleast 8 characters"
        document.getElementById("eye").style.paddingBottom="25px";

        return false;
      }
      else {
        document.getElementById("len").innerHTML=""
          document.getElementById("eye").style.paddingBottom="0px";
        return true;
      }
    }
    function check(){
      var p1=document.getElementById("psw");
      var p2=document.getElementById("cpsw");
      if(p1.value==p2.value){
          document.getElementById('msg').innerHTML=""
          document.getElementById("eye2").style.paddingBottom="0px";
          return true;
      }
      else{
          document.getElementById('msg').innerHTML="Password Mismatch";
          document.getElementById("eye2").style.paddingBottom="25px";
          return false;
      }
    }
    function etoggle()
    {
      var ps1=document.getElementById('lpsw');
      var ic1=document.getElementById('leye');
      if(ps1.type=="password")
      {
        ps1.type="text";
        ic1.className="fa fa-eye"
      }
      else
        {
          ps1.type="password";
          ic1.className="fa fa-eye-slash"
        }
      }
