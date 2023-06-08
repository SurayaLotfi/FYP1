<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../styles/home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--CKEEDITOR: RICH TEXT API-->
    <script src="/ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>

</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>
    
            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li>
                    <a href="/admin/home.php">Home</a>
                </li>
                <li class="active">
                    <a href="manage.php">Manage Content</a>
                </li>
                <li>
                    <a href="/admin/kb.php">Knowledge Base</a>
                </li>
                <!-- <li >
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">View Content</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Courses</a>
                        </li>
                        <li>
                            <a href="#">Document</a>
                        </li>
                        <li>
                            <a href="#">Videos</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="/admin/class.php">Classes</a>
                </li>
                <li>
                    <a href="/admin/onboarding.php">Onboarding</a>
                </li>
                <!-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Upload Content</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li> -->

                <li>
                    <a href="#">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- <div id="home">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
        
                    <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin: 0px">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                </div>
            </nav>
        </div> -->
    
        <!-- Home -->
        <!-- <div id="content"> -->
            <div class="container">
            <!-- We'll fill this with dummy content -->
            <div class="row">
                <br>
                <h1>Manage Content</h1>
            </div>
            <div class="row">
                <div class="buttons">
                    <a href="manage.php">
                    <button type="button" class="btn btn-info active">View</button>
                    </a>
                    <a href="upload.php">
                    <button type="button" class="btn btn-info">Upload Content</button>
                    </a>
                    <a href="create.php">
                    <button type="button" class="btn btn-info">Create Content</button>
                    </a>
                </div>
            </div>
            
            <!--Displaying All Contents-->
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Format</th>
                    <th>Location</th>
                    <th>Content</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </thead>
            <?php
                $i = 1;
                 
                 include "submit.php";

                 $sql = "SELECT * FROM manage_content";
                 $result = mysqli_query($db, $sql);

                 if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $content = $row["content"];
                        $words = explode(" ", $content);
                        $truncatedContent = implode(" ", array_slice($words, 0, 10));
                
                        // Add ellipsis if the content has more than 10 words
                        if (count($words) > 10) {
                            $truncatedContent .= "...";
                        }
                        $id=$row['id']; //for retrieving id purposes utk delete & update
                        $content_name=$row['content_name'];
                        $content_format=$row['content_format'];
                        $content_type=$row['content_type'];
                        $date_created=$row['date_created'];
                        echo 
                         "
                         
                        <tr>
                            <td>" . $i ."</td>
                            <td>" . $content_name ."</td>
                            <td>" . $content_format ."</td>
                            <td>" . $content_type ."</td>
                            <td>" . $truncatedContent ."</td>
                            <td>" . $date_created ."</td>
                            <td> 
                                <div class ='btn-group' role='group'>
                                <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modal'><a href='submit.php?updateid=".$id."&content_name=".$content_name."
                                                                &content_format=".$content_format."&content_type=".$content_type."&content=".$content."
                                                                &date_created=".$date_created."'>Update</a></button>
                                <button class='btn btn-danger'><a href='submit.php?deleteid=".$id."'>Delete</a></button>
                                </div>
                            </td>
                        </tr>
                        ";
                        $i++;
                    }
                 }
            ?>
            </table>
        </div>
        </div>  
   
    </div>  

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
    
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    
    });
    
    </script>

</body>

</html>