<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo base_url('css/css.css');?>">

    <link rel="stylesheet" href="<?php echo base_url ('css/font/css/font-awesome.min.css');?>">

</head>
<body>
<header>
    <div class="top" style="background: #a65980">
        <img src="<?php echo base_url ();?>css/images/color_purple_blue.jpg" title="logo"/>
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SERVICES</a></li>
                <li><a href="#">PORTFOLIO</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">FEATUES</a></li>
                <li><a href="<?php echo base_url ('user/user_profile');?>">CONTACTS</a></li>

            </ul>
        </nav>

        <tr>
            <form>
                <td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px;">
                    <input type="text" name="zoom_query" style=" width: 128px;border: 0px solid;height: 25px; margin-top: 64px;padding: 0px;margin-left: -150px;position: relative;border-radius: 3px">
                </td>
                <td style="border-style:solid;border-color:#4B7B9F;border-width:1px;">
                    <input type="submit" value="" style="border-style: none; background: url('<?php echo base_url ();?>css/images/search.PNG') no-repeat; width: 33px; height: 55px;margin-top: 10px">
                </td>
            </form>
        </tr>



    </div>
    <div class="bottom" style="background: #ececec">
        <h1>FERITA</h1>
        <p><a href="#">Home</a> / <a href="#">Features</a></p>
    </div>
</header>
<main>
    <div id="slide-top">
        <img class="mySlides1" src="<?php echo base_url ();?>css/images/slide-1.jpg" >
        <img class="mySlides1" src="<?php echo base_url ();?>css/images/slide-2.jpg" >
        <img class="mySlides1" src="<?php echo base_url ();?>css/images/slide-3.jpg" >
        <img class="mySlides1" src="<?php echo base_url ();?>css/images/slide-2.jpg" >
        <button type="button" onclick="plusDivs(-1, 0)" class="btn" id="btnPrev">&lt;&lt;</button>
        <button type="button" onclick="plusDivs(1, 0)" class="btn" id="btnNext">&gt;&gt;</button>

    </div>
    <div id="secondary-content">
        <div id="content">
            <div class="left">


                <img class="mySlides2" src="<?php echo base_url ();?>css/images/slide-2.jpg" style="width:100%">
                <img class="mySlides2" src="<?php echo base_url ();?>css/images/slide-3.jpg" style="width:100%">
                <img class="mySlides2" src="<?php echo base_url ();?>css/images/slide-1.jpg" style="width:100%">
                <button class="btn" id="btnPrev" onclick="plusDivs(-1, 1)">&#10094;&#10094;</button>
                <button class="btn" id="btnNext" onclick="plusDivs(1, 1)">&#10095;&#10095;</button>


            </div>

            <div class="right">
                <img id="top" src="<?php echo base_url ();?>css/images/article-image-2.jpg" /><br>
                <h3>SIDEBAR GALLERY</h3><br>

                <img src="<?php echo base_url ();?>css/images/features-icon-1.png" height="45" width="70" vspace="7px" hspace="5px"/>
                <img src="<?php echo base_url ();?>css/images/features-icon-1.png" height="45" width="70" vspace="7px" hspace="5px"/>
                <img src="<?php echo base_url ();?>css/images/features-icon-1.png" height="45" width="70" vspace="7px" hspace="5px"/>
                <img src="<?php echo base_url ();?>css/images/features-icon-1.png" height="45" width="70" vspace="7px" hspace="5px"/>
                <img src="<?php echo base_url ();?>css/images/features-icon-1.png" height="45" width="70" vspace="7px" hspace="5px"/>
                <img src="<?php echo base_url ();?>css/images/features-icon-1.png" height="45" width="70" vspace="7px" hspace="5px"/>

            </div>

        </div>
    </div>
    <div id="features" style="width: 100%; height: 400px">
        <div class="wrapper">
            <ul>
                <li class="feature-1">
                    <h4>Easy to Edit</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum, id fringilla purus feugiat. Etiam malesuada mattis nibh at bibendum.</p>
                    <a href="#">Read move</a>
                </li>
                <li class="feature-2">
                    <h4>Layered PSD</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum, id fringilla purus feugiat. Etiam malesuada mattis nibh at bibendum.</p>
                    <a href="#">Read move</a>
                </li>
                <li class="feature-3">
                    <h4>Ready to Go</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum, id fringilla purus feugiat. Etiam malesuada mattis nibh at bibendum.</p>
                    <a href="#">Read move</a>
                </li>
                <li class="feature-4">
                    <h4>Ready to Go</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum, id fringilla purus feugiat. Etiam malesuada mattis nibh at bibendum.</p>
                    <a href="#">Read move</a>
                </li>
                <div class="clear"></div>
            </ul>
        </div>
    </div>
    <div id="conten2">
        <div id="conten2_left">
            <button type="button" class="accordion"><b>Simple collapsible </b></button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button type="button" class="accordion"><b>Simple collapsible </b></button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button type="button"class="accordion" ><b>Simple collapsible </b></button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div id="conten2_right">
            <button type="button"class="accordion" ><b>Simple collapsible </b></button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
            <button type="button"class="accordion" ><b>Simple collapsible </b></button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit </p>
            </div>
            <button type="button" class="accordion"><b>Simple collapsible </b></button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit </p>
            </div>
        </div>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight){
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>
    </div>
    <div id="content3" style="width: 100%; height: 277px; margin-top: 120px">
        <div id="conten3_left">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'tab1')" id="defaultOpen">TAB TITLE</button>
                <button class="tablinks" onclick="openTab(event, 'tab2')">TAB TITLE</button>
                <button class="tablinks" onclick="openTab(event, 'tab3')">TAB TITLE</button>
                <button class="tablinks" onclick="openTab(event, 'tab4')">TAB TITLE</button>
            </div>

            <div id="tab1" class="tabcontent">


                <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore<img src="<?php echo base_url ();?>css/images/features-icon-1.png" align="right">
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>

            </div>

            <div id="tab2" class="tabcontent">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div id="tab3" class="tabcontent">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="tab4" class="tabcontent">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>



        </div>
        <div id="conten3_right">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'tab5')" id="defaultOpen2">TAB TITLE</button>
                <button class="tablinks" onclick="openTab(event, 'tab6')">TAB TITLE</button>

            </div>
            <div id="tab5" class="tabcontent">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div id="tab6" class="tabcontent">

                <p> Create buttons to open specific tab content. All <div> elements with class="tabcontent" are hidden by default (with CSS & JS). When the user clicks on a button - it will open the tab content that "matches" this button.</p>
            </div>

        </div>
        <script>
            function openTab(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
            document.getElementById("defaultOpen2").click();
        </script>
    </div>
    </div>
    <div id="list-images"style="width: 1225px;height: 633px; ">
        <div id="images-top">
            <img src="<?php echo base_url ();?>css/images/article-image-2.jpg" >
            <img src="<?php echo base_url ();?>css/images/article-image-2.jpg" >
            <img src="<?php echo base_url ();?>css/images/article-image-2.jpg" >
            <img src="<?php echo base_url ();?>css/images/article-image-2.jpg" >

        </div>
        <div id="images-bottom">
            <img src="<?php echo base_url ();?>css/images/video-placeholder.jpg" >
            <img src="<?php echo base_url ();?>css/images/video-placeholder.jpg" >
        </div>
    </div>
    <div class="headline">
        <div>
            <h4>Headlin</h4>
            <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                A fixed element does not leave a gap in the page where it would normally have been located.

                Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
        </div>
        <div id="hang2">
            <div id="text1">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
            <div id="text2">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
        </div>
        <div id="hang3">
            <div id="text3">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
            <div id="text4">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
        </div>
        <div id="hang5">
            <div id="text5">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
            <div id="text6">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
            <div id="text7">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
            <div id="text8">
                <h4>Headlin</h4>
                <p>An element with position: fixed; is positioned relative to the viewport, which means it always stays in the same place even if the page is scrolled. The top, right, bottom, and left properties are used to position the element.

                    A fixed element does not leave a gap in the page where it would normally have been located.

                    Notice the fixed element in the lower-right corner of the page. Here is the CSS that is used:</p>
            </div>
        </div>
    </div>
    <div id="list-link">
        <div class="wrapper">
            <div id="links">
                <ul id="list1">
                    <li><h5>Company</h5></li>
                    <li ><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                </ul>
                <ul id="list2">
                    <li><h5>Company</h5></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                </ul>
                <ul id="list3">
                    <li><h5>Company</h5></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                </ul>
                <ul id="list4">
                    <li><h5>Company</h5></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                    <li><a href="#"> A fixed element does not leave a gap </a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="text-button">
        <h2>
            Headline
        </h2>
        <p>A fixed element does not leave a gap in the page where it would normally have been located.</p>
        <a href="#" class="button"><b>VIEW MORE</b> </a>
    </div>
    <div class="tables">
        <div id="tables-top">
            <table id="t01">
                <tr>
                    <th width="211">Firstname</th>
                    <th width="239">Lastname</th>
                    <th width="518">Age</th>
                    <th width="237">Age</th>
                </tr>
                <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>94</td>
                    <td>94</td>
                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>80</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>80</td>
                    <td>80</td>
                </tr>
            </table>
        </div>
        <div id="tables-bottom" style="float: left; width: 100%; height: 300px; margin-top: 40px">
            <table width="40%" id="t02">
                <tr>
                    <th width="97">Firstname</th>
                    <th width="196">Lastname</th>
                    <th width="181">Age</th>

                </tr>
                <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>

                </tr>
                <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>94</td>

                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>80</td>

                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>80</td>


                </tr>

            </table>
            <table width="40%" id="t03">
                <tr>
                    <th width="97">Firstname</th>
                    <th width="195">Lastname</th>
                    <th width="182">Age</th>

                </tr>
                <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>

                </tr>
                <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>94</td>

                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>80</td>

                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>80</td>


                </tr>

            </table>

            </table>
        </div>

    </div>
</main>
<footer>
    <div class="top" style="background: #a65980 ; height: 400px">
        <div id="footer-info">
            <img style="margin-left: -10px" src="<?php echo base_url ();?>css//images/color_purple_blue.jpg" title="logo"/><br>
            <br>
            <p>Copyright 2014 CompanyName. All rights reservedCopyright 2014 CompanyName. All rights reserved.Copyright 2014 CompanyName. All rights reserved.</p><br>
            <br>
            <br>
            <p>Phone: &nbsp &nbsp &nbsp &nbsp<span style="font-size: 30px">01699807884</span></p><br>
            <p>Email: &nbsp &nbsp &nbsp &nbsp<span style="font-size: 30px">info@modu.vn</span></p>

        </div>
        <div id="footer-info2">
            <ul>
                <li><h5>Company</h5></li>
                <li><a href="#"> A fixed </a></li>
                <li><a href="#"> A fixed </a></li>
                <li><a href="#"> A fixed </a></li>
                <li><a href="#"> A fixed </a></li>
                <li><a href="#"> A fixed  </a></li>
                <li><a href="#"> A fixed  </a></li>
            </ul>
            <ul>
                <li><h5>Company</h5></li>
                <li><a href="#"> A fixed  </a></li>
                <li><a href="#"> A fixed  </a></li>
                <li><a href="#"> A fixed  </a></li>
                <li><a href="#"> A fixed  </a></li>
                <li><a href="#"> A fixed  </a></li>
                <li><a href="#"> A fixed  </a></li>
            </ul>
        </div>
        <div id="footer-info3">
            <h2>from the <b>BLOG</b></h2>
            <p><img style="width: 50px ; margin-right: 20px" src="<?php echo base_url ();?>css/images/features-icon-1.png">A fixed element does not leave a gap in the page where it would normally have been located</p>
            <p><img style="width: 50px ; margin-right: 20px" src="<?php echo base_url ();?>css/images/features-icon-1.png">A fixed element does not leave a gap in the page where it would normally have been located</p>

        </div>
    </div>
    <div class="bottom">
        <p style="float: left; margin-left: 146px; color: white">2013 ModusVersus</p>
        <div id="linkbottom">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
        </div>
    </div>
</footer>
<script>
    var slideIndex = [1,1];
    var slideId = ["mySlides1", "mySlides2"]
    showDivs(1, 0);
    showDivs(1, 1);
    function plusDivs(n, no) {
        showDivs(slideIndex[no] += n, no);
    }
    function showDivs(n, no) {
        var i;
        var x = document.getElementsByClassName(slideId[no]);
        if (n > x.length) {slideIndex[no] = 1}
        if (n < 1) {slideIndex[no] = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex[no]-1].style.display = "block";
    }
</script>
</body>s