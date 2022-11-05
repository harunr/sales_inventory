<?php
require_once "database.php";
class Welcome extends Database{
    //Begin function constructor    
    public function __construct() {
        $obj_db=new Database();
    }
    //End function constructor
    //--------------------------------------------------------------------------
    //Begin function select menu items
    public function select_menu_items()
    {
        $sql="SELECT * FROM tbl_menu WHERE status='1'";
        // $query_result=  mysql_query($sql);
        // return $query_result;
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select menu items
    //--------------------------------------------------------------------------
    //Begin function page content by menu id
    public function select_page_content_by_id($menu_id)
    {
        $sql="SELECT page_content FROM tbl_page_content WHERE menu_id='$menu_id'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function page content by menu id
    //--------------------------------------------------------------------------
    //Begin function select all slide
    public function select_all_slide_image()
    {
        $sql="SELECT * FROM tbl_slide_image WHERE status='1'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all slide
    //--------------------------------------------------------------------------    
    //Begin function save contact
    public function save_contact($data)
    {
        $sql="INSERT INTO tbl_contact (full_name,email_address,contact_no,comments) 
            VALUES('$data[full_name]','$data[email_address]','$data[contact_no]','$data[comments]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Contact Information Save Successfully !';
                return $message;
            }
    }
    //End function save contact
    //--------------------------------------------------------------------------
    //Begin function select all student
    public function select_all_student()
    {
        $sql="SELECT * FROM tbl_student WHERE deletion_status='0'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all student
    //--------------------------------------------------------------------------
    
    //Begin function select student by ajax search
    public function student_id_ajax_search($class_id,$education_year_id)
    {
        $sql="SELECT a1.*,s1.student_id,s1.first_name,s1.last_name FROM tbl_admission a1,tbl_student s1
                WHERE a1.class_id='$class_id' AND a1.education_year_id='$education_year_id'
                AND s1.student_id=a1.student_id";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select student by ajax search
    //--------------------------------------------------------------------------
    //Begin function select student info
    public function select_student_info_by_id($student_id)
    {
        $sql="SELECT *
                FROM tbl_student
                WHERE student_id LIKE '%$student_id%' OR first_name LIKE '%$student_id%' OR last_name LIKE '%$student_id%'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
                
    }
    //End function select student info
    //--------------------------------------------------------------------------
    //Begin function front content by menu id
    public function select_front_content_by_menu_id($menu_id)
    {
        $sql="SELECT * FROM tbl_front_content WHERE menu_id='$menu_id'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function front content by menu id
    //--------------------------------------------------------------------------
    //Begin function select logo
    public function select_logo()
    {
        $sql="SELECT * FROM tbl_logo WHERE status='1' AND deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select logo
    //--------------------------------------------------------------------------
    //Begin function select footer
    public function select_footer_info()
    {
        $sql="SELECT * FROM tbl_footer WHERE status='1' AND deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select footer
    //--------------------------------------------------------------------------
    //Begin function select student info
    public function supplier_id_ajax_search($supplier_id)
    {
        $sql="SELECT *
                FROM tbl_supplier_info
                WHERE supplier_id LIKE '%$supplier_id%'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
                
    }
    //End function select student info
    //--------------------------------------------------------------------------
    //===============================REPORTS QUERY==============================
    //--------------------------------------------------------------------------
    //Begin function select all supplier
    public function select_all_supplier()
    {
        $sql="SELECT * FROM tbl_supplier_info WHERE deletion_status='0'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all supplier
    //--------------------------------------------------------------------------
    //Begin function select all supplier payments
    public function supplier_payments()
    {
        $sql="SELECT * FROM tbl_supplier_payment_info WHERE deletion_status='0'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all supplier payments
    //--------------------------------------------------------------------------
    //Begin function select all supplier
    public function select_supplier_info_by_id($supplier_id)
    {
        $sql="SELECT * FROM tbl_supplier_info WHERE deletion_status='0' and supplier_id='$supplier_id'";;
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all supplier
    //--------------------------------------------------------------------------   
    //Begin function select supplier details
    public function supplier_details_info($data)
    {
        $sql="SELECT s1.first_name,s1.last_name,p1.supplier_id,p1.p_invoice,p1.date,p1.paid_amnt,p1.due_amnt,p1.total_supplier_paid,p1.remarks
                FROM tbl_supplier_info s1, tbl_purchase_info p1
                WHERE p1.supplier_id='$data[supplier_id]'
                and s1.supplier_id=p1.supplier_id
                order by p1.date" ;        
        $query_result=$this->connect()->query($sql);
        return $query_result;
    }
    //End function select supplier details
    //--------------------------------------------------------------------------    
    //Begin function select supplier info
    public function select_supplier_info_by_id_name($supplier_id)
    {
        $sql="SELECT *
                FROM tbl_supplier_info
                WHERE supplier_id LIKE '%$supplier_id%' OR first_name LIKE '%$supplier_id%' OR last_name LIKE '%$supplier_id%'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select supplier info
    //--------------------------------------------------------------------------    
    //Begin function select supplier name
    public function select_supplier_name($data)
    {
        $sql="SELECT first_name,last_name,supplier_id
                FROM tbl_supplier_info
                WHERE supplier_id='$data[supplier_id]'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select supplier name
    //--------------------------------------------------------------------------    
    //Begin function select supplier payment
    public function select_supplier_payment($data)
    {
        $sql="SELECT sum(amnt_paid)
                FROM tbl_supplier_payment_info
                WHERE supplier_id='$data[supplier_id]'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select supplier payment
    //--------------------------------------------------------------------------
    //***************************************************************************
    //--------------------------------------------------------------------------
    //Begin function select all customer
    public function select_all_customer()
    {
        $sql="SELECT * FROM tbl_customer_info WHERE deletion_status='0'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all customer
    //--------------------------------------------------------------------------
    //Begin function select all customer payments
    public function customer_payments()
    {
        $sql="SELECT * FROM tbl_customer_payment_info WHERE deletion_status='0'";
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all customer payments
    //--------------------------------------------------------------------------
    //Begin function select all customer
    public function select_customer_info_by_id($customer_id)
    {
        $sql="SELECT * FROM tbl_customer_info WHERE deletion_status='0' and customer_id='$customer_id'";;
        $result= $this->connect()->query($sql);
        return $result;
    }
    //End function select all customer
    //--------------------------------------------------------------------------    
    //Begin function select customer details
    public function customer_details_info($data)
    {
        $sql="SELECT c1.first_name,c1.last_name,s1.customer_id,s1.s_invoice,s1.date,s1.paid_amnt,s1.due_amnt,s1.total_customer_paid,s1.remarks,s1.discount_amnt
                FROM tbl_customer_info c1, tbl_sales_info s1
                WHERE s1.customer_id='$data[customer_id]'
                and c1.customer_id=s1.customer_id
                order by s1.date" ;        
        $query_result=$this->connect()->query($sql);
        return $query_result;
    }
    //End function select customer details
    //--------------------------------------------------------------------------    
    //Begin function select customer info
    public function select_customer_info_by_id_name($customer_id)
    {
        $sql="SELECT *
                FROM tbl_customer_info
                WHERE customer_id LIKE '%$customer_id%' OR first_name LIKE '%$customer_id%' OR last_name LIKE '%$customer_id%'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select customer info
    //--------------------------------------------------------------------------    
    //Begin function select customer name
    public function select_customer_name($data)
    {
        $sql="SELECT first_name,last_name,customer_id
                FROM tbl_customer_info
                WHERE customer_id='$data[customer_id]'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select customer name
    //--------------------------------------------------------------------------    
    //Begin function select customer name
    public function select_customer_name_by_id($customer_id)
    {
        $sql="SELECT first_name,last_name,customer_id
                FROM tbl_customer_info
                WHERE customer_id='$customer_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select customer name
    //--------------------------------------------------------------------------    
    //Begin function select customer payment
    public function select_customer_payment($data)
    {
        $sql="SELECT sum(amnt_paid)
                FROM tbl_customer_payment_info
                WHERE customer_id='$data[customer_id]'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select customer payment
    //--------------------------------------------------------------------------    
    //Begin function select sales_report
    public function sales_report_parent_info($data)
    {
        $sql="SELECT *
                FROM tbl_sales_info
                WHERE sales_id=$data[sales_id]";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select ssales_report
    //--------------------------------------------------------------------------    
    //Begin function select sales_report
    public function select_sales_report_details_info($sales_id)
    {
        $sql="SELECT *
                FROM tbl_sales_detail_info
                WHERE sales_id='$sales_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select ssales_report
    //--------------------------------------------------------------------------    
    //Begin function select supplier info
    public function select_sales_id($sales_id)
    {
        $sql="SELECT *
                FROM tbl_sales_info
                WHERE sales_id LIKE '%$sales_id%'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select supplier info
    //--------------------------------------------------------------------------    
    //Begin function select sales date wise
    public function select_sales_date_wise($data)
    {
        $sql="SELECT *
                FROM tbl_sales_info
                WHERE date between '$data[date_from]' and '$data[date_to]'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select sales date wise
    //--------------------------------------------------------------------------    
    //Begin function select purchase date wise
    public function select_purchase_date_wise($data)
    {
        $sql="SELECT *
                FROM tbl_purchase_info
                WHERE date between '$data[date_from]' and '$data[date_to]'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select purchase date wise
    //--------------------------------------------------------------------------    
    //Begin function select sales date wise
    public function select_profit_loss_date_wise($data)
    {
        $sql="SELECT si.sales_id S_id,si.date date, sd.purchase_detail_id D_id,sd.product_id Product,pd.unit_cost Cost,sd.unit_price Price,sd.qty_sold Qty
                FROM tbl_sales_detail_info sd,tbl_purchase_detail_info pd,tbl_sales_info si
                WHERE sd.purchase_detail_id=pd.purchase_detail_id 
                AND sd.sales_id=si.sales_id
                AND si.date between '$data[date_from]' and '$data[date_to]'
                ORDER BY sd.purchase_detail_id";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select sales date wise
    //--------------------------------------------------------------------------   
    //Begin function save Return Sale
    public function save_return_sale($data)
    {
        $sql="INSERT INTO tbl_return_sales_info (sales_detail_id,date,purchase_detail_id,product_id,qty_return,remarks,status) 
            VALUES('$data[sales_detail_id]','$data[date]','$data[purchase_detail_id]','$data[product_id]','$data[qty_return]','$data[remarks]','1')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Return Sales Save Successfully !';
                return $message;
            }
    }
    //End function save Return Sale  
    //-------------------------------------------------------------------------- 
    public function select_all_sales_detail()
    {
        $sql="SELECT * FROM tbl_sales_detail_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function save Return Sale
    //--------------------------------------------------------------------------
    //Begin function select all Sales detail by id
    public function select_sales_detail_by_sales_id($sales_detail_id)
    {
        $sql="SELECT * FROM tbl_sales_detail_info WHERE deletion_status='0' and sales_detail_id='$sales_detail_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Sales detail by id
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //Begin function select all products info
    public function select_product_info()
    {
        $sql="SELECT p1.product_id PId,p1.product_name PName,p1.product_code PCode,
        p1.qty_stock Stock,p1.current_price Price,p2.product_cat_id CatId,p2.product_cat_name CatName
        FROM tbl_product_info p1,tbl_product_cat_info p2
        WHERE p2.product_cat_id = p1.product_cat_id
        ORDER BY CatId";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all products info
    //--------------------------------------------------------------------------
    //Begin function select all products info
    public function select_product_info_cat_wise($product_cat_id)
    {
        $sql="SELECT p1.product_id PId,p1.product_name PName,p1.product_code PCode,
        p1.qty_stock Stock,p1.current_price Price,p2.product_cat_id CatId,p2.product_cat_name CatName
        FROM tbl_product_info p1,tbl_product_cat_info p2
        WHERE p2.product_cat_id = p1.product_cat_id AND p2.product_cat_id=$product_cat_id
        ORDER BY CatId";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all products info
    //--------------------------------------------------------------------------
    //Begin function select product cat info by id
    public function select_product_cat_info_by_id($product_cat_id)
    {
        $sql="SELECT * FROM tbl_product_cat_info WHERE deletion_status='0' and product_cat_id='$product_cat_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select product cat info by id
    //-------------------------------------------------------------------------- 
}
