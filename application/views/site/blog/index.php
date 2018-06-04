<script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("search_price").style.display = "none";
        document.getElementById("danhmuc").style.display ="none"
    });

</script>

<style>


#right {
    height: 1000px;
}
    nav {
        float: left;
        max-width: 160px;
        margin: 0;
        padding: 1em;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    nav ul a {
        text-decoration: none;
    }

    #features {
        margin-left: 100px;
    }


    #features ul {
        margin: 40px 0;
        list-style: none;
        margin-left: 75px;

    }
    #features ul li {
        width: 500px;
        float: left;
        margin-left: -152px;
        margin-top: 44px;
        text-align: center;
        box-shadow: 2px 2px 2px #EEEEEE;


    }
    #features3{
        float: right;
        margin-top: -453px;
        margin-right: 106px;
        width: 40%;
        color: #888;
    }
    #features3 p{
        overflow: auto
    }
    #features3 img{
        float: left;
    }
    #conter{
        margin-top: 176px;
        margin-left: 134px;
    }
    #conter ul{
        margin: 40px 0;
        list-style: none;
        margin-left: 75px;
    }
    #conter ul li{
        width: 298px;
        float: left;
        margin-right: 8px;
        text-align: center;
        height: 351px;
        box-shadow: 2px 2px 2px #EEEEEE;
    }


</style>
</head>
<body>
<div class="container">



    <div id="features" style="width: 100%; height: 400px">
        <div id="top">

            <ul>
                <li class="feature-1">
                    <a href="<?php echo base_url('blog/chitiet'); ?>"> <img src="<?php echo base_url('upload'); ?>/products/155.jpg"></a>
                    <h4>Easy to Edit</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum.</p>
                </li>
                <div class="clear"></div>
            </ul>
        <div id="features3">
            <h2>from the <b>BLOG</b></h2>
            <p><img style="width: 60px ; margin-right: 20px" src="<?php echo base_url('upload'); ?>/products/145.jpg">A fixed element does not leave a gap in the page where it would normally have been located</p>
            <p><img style="width: 60px ; margin-right: 20px" src="<?php echo base_url('upload'); ?>/products/146.jpg">A fixed element does not leave a gap in the page where it would normally have been located</p>
            <p><img style="width: 60px ; margin-right: 20px" src="<?php echo base_url('upload'); ?>/products/147.jpg">A fixed element does not leave a gap in the page where it would normally have been located</p>
            <p><img style="width: 60px ; margin-right: 20px" src="<?php echo base_url('upload'); ?>/products/148.jpg">A fixed element does not leave a gap in the page where it would normally have been located</p>

        </div>
        </div>

    </div>
    <div id="conter">

            <ul>
                <li class="feature-2">
                    <a href="<?php echo base_url('blog/chitiet'); ?>"> <img style=" width: 229px;height: 222px;" src="<?php echo base_url('upload'); ?>/products/149.jpg"></a>
                    <h4>Easy to Edit</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum.</p>
                </li>

            </ul>
            <ul>
                <li class="feature-3">
                    <a href="<?php echo base_url('blog/chitiet'); ?>"> <img style="width: 229px;height: 222px;"src="<?php echo base_url('upload'); ?>/products/157.jpg"></a>
                    <h4>Easy to Edit</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum.</p>
                </li>

            </ul>
            <ul>
                <li class="feature-4">
                    <a href="<?php echo base_url('blog/chitiet'); ?>"> <img style="width: 229px;height: 222px;" src="<?php echo base_url('upload'); ?>/products/159.jpg"></a>
                    <h4>Easy to Edit</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mollis turpis ac libero interdum.</p>
                </li>

            </ul>

    </div>



</div>



</body>
