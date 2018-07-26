    </div>
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, Stephanie Owusu Agyeman</div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>