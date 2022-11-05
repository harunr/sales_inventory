<?php
    if(isset($page))
     {
//------------------------------------------------------------------------
        if($page=='add_customer_image_form.php')
        {
            include './pages/add_customer_image_form.php';
        }        
//------------------------------------------------------------------------
        if($page=='sales_return_param_form.php')
        {
            include './pages/sales_return_param_form.php';
        }
        if($page=='manage_return_sale_view.php')
        {
            include './pages/manage_return_sale_view.php';
        }
        if($page=='edit_return_sale_form.php')
        {
            include './pages/edit_return_sale_form.php';
        }
//------------------------------------------------------------------------
        if($page=='purchase_detail_print_view.php')
        {
            include './pages/purchase_detail_print_view.php';
        }
        if($page=='sales_detail_print_view.php')
        {
            include './pages/sales_detail_print_view.php';
        }        
//------------------------------------------------------------------------
        if($page=='add_sale_detail_form.php')
        {
            include './pages/add_sale_detail_form.php';
        }
        if($page=='manage_sale_detail_view.php')
        {
            include './pages/manage_sale_detail_view.php';
        }
        if($page=='edit_sale_detail_form.php')
        {
            include './pages/edit_sale_detail_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_sale_form.php')
        {
            include './pages/add_sale_form.php';
        }
        if($page=='manage_sale_view.php')
        {
            include './pages/manage_sale_view.php';
        }
        if($page=='edit_sale_form.php')
        {
            include './pages/edit_sale_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_purchase_detail_form.php')
        {
            include './pages/add_purchase_detail_form.php';
        }
        if($page=='manage_purchase_detail_view.php')
        {
            include './pages/manage_purchase_detail_view.php';
        }
        if($page=='edit_purchase_detail_form.php')
        {
            include './pages/edit_purchase_detail_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_purchase_form.php')
        {
            include './pages/add_purchase_form.php';
        }
        if($page=='manage_purchase_view.php')
        {
            include './pages/manage_purchase_view.php';
        }
        if($page=='edit_purchase_form.php')
        {
            include './pages/edit_purchase_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_product_form.php')
        {
            include './pages/add_product_form.php';
        }
        if($page=='manage_product_list_view.php')
        {
            include './pages/manage_product_list_view.php';
        }
        if($page=='edit_product_list_form.php')
        {
            include './pages/edit_product_list_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_category_form.php')
        {
            include './pages/add_category_form.php';
        }
        if($page=='manage_category_view.php')
        {
            include './pages/manage_category_view.php';
        }
        if($page=='edit_category_form.php')
        {
            include './pages/edit_category_form.php';
        }
//------------------------------------------------------------------------
         if($page=='add_manufacturer_form.php')
         {
             include './pages/add_manufacturer_form.php';
         }
         if($page=='manage_manufacturer_view.php')
         {
             include './pages/manage_manufacturer_view.php';
         }
         if($page=='edit_manufacturer_form.php')
         {
             include './pages/edit_manufacturer_form.php';
         }
//------------------------------------------------------------------------
         if($page=='add_supplier_form.php')
         {
             include './pages/add_supplier_form.php';
         }
         if($page=='manage_supplier_view.php')
         {
             include './pages/manage_supplier_view.php';
         }
         if($page=='edit_supplier_form.php')
         {
             include './pages/edit_supplier_form.php';
         }
//------------------------------------------------------------------------
        if($page=='add_customer_form.php')
        {
            include './pages/add_customer_form.php';
        }
        if($page=='manage_customer_view.php')
        {
            include './pages/manage_customer_view.php';
        }
        if($page=='edit_customer_form.php')
        {
            include './pages/edit_customer_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_supplier_payment_form.php')
        {
            include './pages/add_supplier_payment_form.php';
        }
        if($page=='manage_supplier_payment_view.php')
        {
            include './pages/manage_supplier_payment_view.php';
        }
        if($page=='edit_supplier_payment_form.php')
        {
            include './pages/edit_supplier_payment_form.php';
        }
//------------------------------------------------------------------------
        if($page=='add_customer_payment_form.php')
        {
            include './pages/add_customer_payment_form.php';
        }
        if($page=='manage_customer_payment_view.php')
        {
            include './pages/manage_customer_payment_view.php';
        }
        if($page=='edit_customer_payment_form.php')
        {
            include './pages/edit_customer_payment_form.php';
        }
//------------------------------------------------------------------------        
        if($page=='add_open_stock_form.php')
        {
            include './pages/add_open_stock_form.php';
        }
        if($page=='manage_open_stock_view.php')
        {
            include './pages/manage_open_stock_view.php';
        }
        if($page=='edit_open_stock_form.php')
        {
            include './pages/edit_open_stock_form.php';
        }
//------------------------------------------------------------------------        
         if($page=='add_footer_form.php')
         {
             include './pages/add_footer_form.php';
         }
         if($page=='manage_footer_view.php')
         {
             include './pages/manage_footer_view.php';
         }
         if($page=='edit_footer_form.php')
         {
             include './pages/edit_footer_form.php';
         }
//------------------------------------------------------------------------        
         if($page=='add_company_info_form.php')
         {
             include './pages/add_company_info_form.php';
         }
         if($page=='manage_company_info_view.php')
         {
             include './pages/manage_company_info_view.php';
         }
         if($page=='edit_company_info_form.php')
         {
             include './pages/edit_company_info_form.php';
         }
//------------------------------------------------------------------------ 
         if($page=='add_user_form.php')
         {
             include './pages/add_user_form.php';
         }
         if($page=='manage_user_view.php')
         {
             include './pages/manage_user_view.php';
         }
         if($page=='edit_user_form.php')
         {
             include './pages/edit_user_form.php';
         }
//========================================================================
     }
    else
     {                            
         include './pages/admin_content.php';                            
     }
//========================================================================