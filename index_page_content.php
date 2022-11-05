<?php
    if(isset($page_view))
     {
          if($page_view=='supplier_param_form.php')
             {include './view_pages/supplier_param_form.php';}
          
          if($page_view=='customer_param_form.php')
               {include './view_pages/customer_param_form.php';}
          
          if($page_view=='sales_report_param_form.php')
               {include './view_pages/sales_report_param_form.php';}

          if($page_view=='return_sales_param_form.php')
               {include './view_pages/return_sales_param_form.php';}
          
          if($page_view=='sales_date_wise_param_form.php')
               {include './view_pages/sales_date_wise_param_form.php';}
          
          if($page_view=='purchase_date_wise_param_form.php')
               {include './view_pages/purchase_date_wise_param_form.php';}

          if($page_view=='profit_loss_date_wise_param_form.php')
               {include './view_pages/profit_loss_date_wise_param_form.php';}

          if($page_view=='product_param_form.php')
               {include './view_pages/product_param_form.php';}
     }
    else
         {include './view_pages/home_content.php';}