
<?php
include './class/at-class.php';
login_auth();
$page_title = "Sub Category";

//
//if(role_check("1","can_insert")<1)
//{
//    redirect(base_url()."?success=2&msg=you dont have permission to access this page.");
//}
$queryconnection=new mysqli("localhost","root","","summerproject");
$get_admin = get_result("SELECT * FROM tbl_admin");
if (isset($_POST['submit'])) 
{
    $sub_category_photo = file_upload($upload_path, $_FILES['sub_category_image']['name'], $_FILES['sub_category_image']['tmp_name'],$_POST['sub_category_name']);
    $imageFileType = strtolower(pathinfo($sub_category_photo,PATHINFO_EXTENSION));
   
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
    {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        redirect("?success=2&msg=Please Enter valid file format");
    }
    else
    {
        $insert_array = array(
        "s_name" => mysqli_real_escape_string($queryconnection,$_POST['sub_category_name']),
        "c_id" => $_POST['category_id'],
        "s_image" => $sub_category_photo,
        "login_id" => userloginid()
        );  
        $inserted = bindinsert("tbl_sub_category", $insert_array);
        $insid = insertid();
        if ($inserted) 
        {
            add_activity("New $page_title Add ","$page_title Added And $page_title Id Is $insid");
            redirect("?success=1&msg=$page_title Created Successfully");
        } 
    }    
}


?>

<!DOCTYPE html>
<html lang="en">

    <head>
<?php
include './include/form-header-script.php';
?>
    </head>

    <body >
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="ball-scale">
                <div></div>
            </div>
        </div>
        <!-- Pre-loader end -->

        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">

<?php
include './include/header.php';
?>

                <!-- Sidebar chat start -->

                <!-- Sidebar inner chat start-->

                <!-- Sidebar inner chat end-->
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
<?php
include './include/side-bar.php';
?>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">

                                <!-- Main-body start -->
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page header start -->
                                        <div class="page-header">
                                            <div class="page-header-title">
                                                <h4>Add New <?php echo $page_title; ?></h4>

                                            </div>
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.php">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    
                                                    <li class="breadcrumb-item"><a href="#!"><?php echo $page_title; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Page header end -->
                                        <!-- Page body start -->
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- Basic Inputs Validation start -->
                                                    <div class="card">
                                                        <div class="card-header">

                                                            <div style="float: right">
                                                                <button onclick="window.location.href = '<?php echo base_url(); ?>admin/sub-category-list.php'" class="btn btn-primary">View</button>
                                                            </div>
                                                        </div>
                                                        <div class="card-block">
                                                            <form method="post"  enctype="multipart/form-data" id="myform">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label strong">Sub Category Name</label>
                                                                            <div class="col-sm-12">
                                                                                <input type="text" class="form-control" name="sub_category_name" required="" placeholder="sub category Name">
                                                                                <span class="messages"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label strong">Image</label>
                                                                            <div class="col-sm-12">
                                                                                <input type="file" class="form-control" name="sub_category_image"  placeholder="sub category image">
                                                                                <span class="messages"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-12 col-form-label strong">Category Name</label>
                                                                            <div class="col-sm-12">
                                                                                <select class='form-control' name='category_id'>
                                                                                <?php
                                                                                
                                                                                        $category_data= mysqli_query($queryconnection,"select * from tbl_category");
                                                                                        while($category_row= mysqli_fetch_array($category_data))
                                                                                        {
                                                                                          echo "<option value='{$category_row['c_id']}'>{$category_row['c_name']}</option>";  
                                                                                        }                          
                                                                   
                                                                                ?>
                                                                                </select>
                                                                                <span class="messages"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    </div>
                                                                    <div class="col-md-12>"

                                                                         <div class="form-group row" style="float: right;">
                                                                            <label class="col-sm-12"></label>
                                                                            <div class="col-sm-12">
                                                                                <button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
                                                                            </div>
                                                                        </div>
                                                              
                                                                    </div>
                                                                     </form>


                                                                </div>

                                                        </div>
                                                       
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include './include/form-footer-script.php';
?>
    <script>
          function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
        
        
        </script>
        
</body>

</html>
