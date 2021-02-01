


    <?php include("includes/header.php");?>

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Our Courses</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3> All Courses</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_courses">
            <div class="container">
                <?php
            $sql = "SELECT courses.id AS courseid, courses.name AS coursename,img,cats.name AS catname FROM courses JOIN cats ON courses.cat_id= cats.id ORDER BY courses.id DESC ";
         
         //$sql = "SELECT * FROM  cats";
         $result = $conn->query($sql);

         if (!empty($result) && $result->num_rows > 0) {

             $Courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
         } else {
             $Courses = [];
         }
        ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                
                            <?php foreach($Courses as $course){?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single_courses">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/web/img/courses/<?php echo $course['img'];?>" alt="">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <span><?php echo $course['catname'];?></span>
                                                <h3><a href="#"><?php echo $course['coursename'];?> </a></h3>	

                                            </div>
                                        </div>
                                    </div>

                                    <?php }?>
                                   
                                    
                                   
                                  
                                   
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->
    <?php include("includes/footer.php");?>
    
    
