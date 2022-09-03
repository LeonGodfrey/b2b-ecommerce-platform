
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>stockUg</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <!-- Custom CSS -->
  <style type="text/css">
    /* nav bar bg color */
    #navbar{
      background-color: black;
      /* font-family:Arial; */
    }
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px){ 
      #navbar-search-input{ 
        width: 60px; 
      }
      #navbar-search-input:focus{ 
        width: 100px; 
      }
    }

    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px){ 
      #navbar-search-input{ 
        width: 150px; 
      }
      #navbar-search-input:focus{ 
        width: 250px; 
      } 
    }

    .word-wrap{
      overflow-wrap: break-word;
    }
    .prod-body{
      height:250px;
    }
    .prod-body1{
      height:auto;
    }

    .card:hover {
      box-shadow: 0 9px 18px 0 rgba(0,0,0,0.2);        
    }
    .register-box{
      margin-top:20px;
    }

    #trending{
      list-style: none;
      padding:10px 5px 10px 15px;
    }
    #trending li {
      padding-left: 1.3em;
    }
    #trending li:before {
      content: "\f046";
      font-family: FontAwesome;
      display: inline-block;
      margin-left: -1.3em; 
      width: 1.3em;
    }

    /*Magnify*/
    .magnify > .magnify-lens {
      width: 100px;
      height: 100px;
    }
    p{
      margin: 0;
      padding: 0;
      font-size: 14px;
    }
    .s-warning{
      background-color: orange;
      color: white;
    }
    .st-warning{      
      color: orange;
    }

    .s-danger{
      background-color: red;
      color: white;

    }
    .s-success{
      background-color: green;
      color: white;

    }
    #btn-back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: none;
    }

    .dist_list{
      padding: 20px;
      text-align: center;
      align-items: center;
    }



    /***** Footer *****/

    .footer-top { padding: 60px 0; background: #333; text-align: left; color: #aaa; }
    .footer-top h3 { padding-bottom: 10px; color: #fff; }

    .footer-about img.logo-footer { max-width: 74px; margin-top: 0; margin-bottom: 18px; }
    .footer-about p a { border: 0; }
    .footer-about p a:hover, .footer-about p a:focus { border: 0; }

    .footer-contact p { word-wrap: break-word; }
    .footer-contact i { padding-right: 10px; font-size: 18px; color: #666; }
    .footer-contact p a { border: 0; }
    .footer-contact p a:hover, .footer-contact p a:focus { border: 0; }

    .footer-links a { color: #aaa; border: 0; }
    .footer-links a:hover, .footer-links a:focus { color: #fff; }

    .footer-bottom { padding: 15px 0 17px 0; background: #444; text-align: left; color: #aaa; }

    .footer-social { padding-top: 3px; text-align: right; }
    .footer-social a { margin-left: 20px; color: #777; border: 0; }
    .footer-social a:hover, .footer-social a:focus { color: #79a05f; border: 0; }
    .footer-social i { font-size: 24px; vertical-align: middle; }

    .footer-copyright { padding-top: 5px; }
    .footer-copyright a { color: #fff; border: 0; }
    .footer-copyright a:hover, .footer-copyright a:focus { color: #aaa; border: 0; }


  </style>


</head>