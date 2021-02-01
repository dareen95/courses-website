<?php include("includes/header.php");?>

    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="assets/web/img/banner/edu_ilastration.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
                            <h3>welcome <br>
                                DareenAcademy <br>
                                 OnlineCourses</h3>
                            <a href="all-courses.php" class="boxed_btn">Browse Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3>Choose from 130,000 <br>
                        online video courses <br>
                     </h3>
                        <p>An expert is one who knows more and more about less and less until he knows absolutely everything about
nothing </p> 
                        <a href="#" class="boxed_btn">Enroll a Course</a>
                    </div>
                </div>
                <?php
                //courses counts
                $sql = " SELECT COUNT( id) FROM courses  ";
                //$sql = "SELECT * FROM  cats";
                $result = $conn->query($sql);
       
       
                    $Coursescount = mysqli_fetch_row($result)[0];
                    
                     //tracks counts
                $sql = " SELECT COUNT( id) FROM cats  ";
                //$sql = "SELECT * FROM  cats";
                $result = $conn->query($sql);
       
       
                    $catscount = mysqli_fetch_row($result)[0];
                    
                     //enrollelements counts
                $sql = " SELECT COUNT( id) FROM reservations  ";
                //$sql = "SELECT * FROM  cats";
                $result = $conn->query($sql);
       
       
                    $reservcount = mysqli_fetch_row($result)[0];
                   
               
                ?>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <div class="courses">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span> <?php echo $Coursescount;?></span>
                                    <p> Courses</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses-blue">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span><?php echo$catscount;?></span>
                                    <p> Tracks</p>
                                </div>

                            </div>
                        </div>
                        <div class="courses-sky">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span><?php echo$reservcount;?></span>
                                    <p> Enrollelements</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3> Latest courses</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php 
         $sql = "SELECT courses.id AS courseid, courses.name AS coursename,img,cats.name AS catname FROM courses JOIN cats ON courses.cat_id= cats.id ORDER BY courses.id DESC LIMIT 3
         ";
         //$sql = "SELECT * FROM  cats";
         $result = $conn->query($sql);

         if (!empty($result) && $result->num_rows > 0) {

             $LatestCourses = mysqli_fetch_all($result, MYSQLI_ASSOC);
         } else {
             $LatestCourses = [];
         }
        ?>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                            <?php foreach($LatestCourses as $course){?>
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
                                   
                                   
                                    <div class ="col-xl-12">
                                        <div class="more_courses text-center">
                                            <a href="all-courses.php" class="boxed_btn_rev">More Courses</a>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->

<?php include("includes/footer.php");?>
    