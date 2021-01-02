<!--Footer-part-->



<!--end-Footer-part-->

<script src="<?php echo PUBLIC_PATH; ?>js/excanvas.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.ui.custom.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.flot.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.flot.resize.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.peity.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/fullcalendar.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.dashboard.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.gritter.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.interface.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.chat.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.validate.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.form_validation.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.wizard.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.uniform.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/select2.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.popover.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.tables.js"></script>

<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<
<!--FOR CHECK ALL ITEM-->

<script>

    function checkAll(ele) {
        var checkboxes = document.getElementsByName('checked[]');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i)
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
</script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>