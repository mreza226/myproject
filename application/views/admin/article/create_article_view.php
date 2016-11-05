<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Create Articles</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" value="" placeholder="Article Title">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="textarea" id="description" placeholder="Description Detail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                 
                </div>
              </div>                                      
            </div><!-- /.box-body -->            
              <div class="box-footer">                        
                <button type="button" onclick="save()" id="kirim_surat_button" class="btn btn-primary btn-flat" >Save</button> 
                <button type="button" id="reset_button" onclick="reset()" class="btn btn-default btn-flat">Clear</button>              
            </div><!-- /.box-footer -->   
          </form>
        </div><!-- /.box -->
        </div>        
    </div>
</section><!-- /.content -->

<?php
$this->load->view('template/js');
?>


<script>
    $(document).ready(function() {                        
        $(".textarea").wysihtml5();
    }); 

    function save() 
    {
        //alert($("#title").val())
        var title = $("#title").val();
        var description = $("#description").val();

        if (title == "") {
            $("#title").notify("Empty Article Title", {position:"top center", className:"warn"});
            $("#title").focus();
        } else if (description == "") {
            $("#description").notify("Empty description", {position:"top center", className:"warn"});
            $("#description").focus();         
        } else {
            // alert(lampiran);        
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/article/create_article',                
                data:"title="+title+"&description="+description,
                beforeSend:function(msg){
                    $.notify("Processing ...", {position:"top right", className:"warn"});
                },
                success:function(msg){
                    //alert(msg);
                    $.notify("Successfully", {position:"top right", className:"info"});                    
                    //location.href='<?php echo base_url();?>inquiry/display';                    
                    //document.reload();
                },
                error:function(msg){
                    $.notify("Error While Saving ...", {position:"top right", className:"error"});
                }
            });                    
        }
    }

    function reset()
    {
        $('.form-control').val('');
    }
</script>
