
<!-- Cookie notice div -->
<div id="cookie_notice" style="background-color:lightgray; border:solid 2px darkgrey;
border-radius:10px; text-align:center; padding:10px; width:25%;">
    <!-- 
  <options=bold>“ Because you are alive, everything is possible. ”</>
  <fg=gray>— Thich Nhat Hanh</>
 -->

 <p>By using our site, you agree to our cookie policy.</p>
 <button onclick="hideCookieNotice()">Okay</button>

</div>

<script>
  // Function that allows the user to hide the cookie notice when they
  // click the Okay button.
  function hideCookieNotice() {
      let cookie_div = document.getElementById("cookie_notice");
  
      cookie_div.style.display = "none";
  }
</script>