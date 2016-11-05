<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Article
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Article</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">  
  <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="datatable1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Article Title</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i=0; 
                        foreach($display as $list) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $list['title']; ?></td>
                            <td><?php echo $list['description']; ?></td>
                            <td><?php echo $list['created']; ?></td>
                            <td>
                              <!--<a href="<?php echo base_url();?>inquiry/edit/<?php echo $list['id_inquiry'];?>">
                                <i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                              </a>-->
                                <button type="button" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#edit_article"><i class="fa fa-edit"></i></button>                      
                                <button type="button" class="btn btn-danger btn-flat btn-xs" onclick="delete_list('<?php echo $list['id']; ?>')"><i class="fa fa-remove" data-toggle="tooltip" data placement="bottom" title="delete"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>                
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Article Title</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->        
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->



<?php
$this->load->view('template/js');
?>

<?php
$this->load->view('template/foot');
?>

<!-- Modal -->
<div class="modal fade" id="edit_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Article</h4>
            </div>
            <div class="modal-body">                
                <form class="form-horizontal">
                <input type="text" name="id" id="id" value="<?php echo $detail['id']; ?>">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>            
                    </div><!-- /.box-footer -->   
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<script>
    $(document).ready(function(){ 
        $("#datatable1").DataTable({
          "iDisplayLength": 20,
          "aLengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]]              
        });
        
        $(".textarea").wysihtml5();
    });

    function delete_list(id) {
        alert(id);
        if (confirm('Are you sure want to delete ?')) {
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>article/delete',
                data: "id="+id,
                beforeSend:function(msg){
                    $.notify("Processing ...", {position:"top right", className:"warn"});
                },
                success:function(msg){
                    $.notify("successfully", {position:"top right", className:"info"});
                    location.reload();
                },
                error:function(msg){
                    $.notify("Tidak berhasil ...", {position:"top right", className:"error"});
                }
            });
        }
    }
    
</script>