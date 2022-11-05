<?php
require_once '../classes/database.php';

class Admin extends Database {
    //Begin function constructor    
    public function __construct() {
        $obj_db=new Database();
    }
    //End function constructor
    //--------------------------------------------------------------------------
    //Begin function save sale
    public function save_sale($data)
    {       
        $sql="INSERT INTO tbl_sales_info (customer_id,date,status,user_name) 
            VALUES('$data[customer_id]','$data[date]','1','$data[user_name]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Sale Save Successfully !';
                return $message;
            }
    }
    //End function save sale    
    //--------------------------------------------------------------------------
    //Begin function select all sale
    public function select_all_sale()
    {
        $sql="SELECT * FROM tbl_sales_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all sale
    //--------------------------------------------------------------------------
    //Begin function select max sale ID
    public function select_max_sale_id($customer_id,$user_name)
    {       
        $sql="SELECT max(sales_id) max_id FROM tbl_sales_info WHERE customer_id='$customer_id' and user_name='$user_name'";        
        $query_result=$this->connect()->query($sql);
        return $query_result;
    }
    //End function select max sale ID
    //--------------------------------------------------------------------------
    //Begin function select all sale with customer
    public function select_all_sale_customer()
    {
        $sql="SELECT p1.sales_id,p1.customer_id,p1.date,p1.paid_amnt,
        p1.due_amnt,p1.discount_amnt,p1.total_customer_paid,p1.status,s1.first_name,s1.last_name
        FROM tbl_sales_info p1,tbl_customer_info s1 
        WHERE p1.customer_id=s1.customer_id and p1.deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all sale with customer
    //--------------------------------------------------------------------------
    //Begin function select sales by id
    public function select_sales_by_id($sales_id)
    {
        $sql="SELECT * FROM tbl_sales_info WHERE sales_id='$sales_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select sales by id
    //--------------------------------------------------------------------------
    //Begin function update sale
    public function update_sale_info($data)
    {
        $sql="UPDATE tbl_sales_info 
                SET customer_id='$data[customer_id]',                
                date='$data[date]',paid_amnt='$data[paid_amnt]',discount_amnt='$data[discount_amnt]',
                total_customer_paid='$data[total_customer_paid]',remarks='$data[remarks]',
                due_amnt='$data[due_amnt]',status='$data[status]'                
                WHERE sales_id='$data[sales_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Sale Information !';
        header('Location:manage_sale.php');
        return $message;
        }
    }
    //End function update sale
    //--------------------------------------------------------------------------
    //Begin function active sale
    public function active_sale($id)
    {
        $sql="UPDATE tbl_sales_info SET status='1' WHERE sales_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_sale.php'); 
    }
    //End function active sale
    //--------------------------------------------------------------------------
    //Begin function inactive sale
    public function inactive_sale($id)
    {
        $sql="UPDATE tbl_sales_info SET status='0' WHERE sales_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_sale.php');
    }
    //End function inactive sale
    //--------------------------------------------------------------------------
    //Begin function delete sale
    public function delete_sale($id)
    {
        $sql="UPDATE tbl_sales_info SET deletion_status='1' WHERE sales_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_sale.php'); 
    }
    //End function delete sale
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
    //Begin function select all Purchase detail by id
    public function select_purchase_detail_by_sales_id($purchase_id)
    {
        $sql="SELECT * FROM tbl_purchase_detail_info WHERE deletion_status='0' and purchase_id='$purchase_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Purchase detail by id  
    //--------------------------------------------------------------------------
    //Begin function select all sale detail
    public function select_all_sales_detail()
    {
        $sql="SELECT * FROM tbl_sales_detail_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all sale
    //--------------------------------------------------------------------------
    //Begin function active sale detail
    public function active_sale_detail($id)
    {
        $sql="UPDATE tbl_sales_detail_info SET status='1' WHERE sales_detail_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_sale_detail.php'); 
    }
    //End function active sale detail
    //--------------------------------------------------------------------------
    //Begin function inactive sale detail
    public function inactive_sale_detail($id)
    {
        $sql="UPDATE tbl_sales_detail_info SET status='0' WHERE sales_detail_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_sale_detail.php');
    }
    //End function inactive sale detail
    //--------------------------------------------------------------------------
    //Begin function delete sale detail
    public function delete_sale_detail($id)
    {
        $sql="UPDATE tbl_sales_detail_info SET deletion_status='1' WHERE sales_detail_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_sale_detail.php'); 
    }
    //End function delete sale detail
    //--------------------------------------------------------------------------
    //----------------------------BEGIN SALES DETAIL----------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function select max Sales ID
    public function select_max_sales_id($customer_id,$user_name)
    {       
        $sql="SELECT max(sales_id) max_id FROM tbl_sales_info WHERE customer_id='$customer_id' and user_name='$user_name'";        
        $query_result=$this->connect()->query($sql);
        return $query_result;
    }
    //End function select max Sales ID
    //--------------------------------------------------------------------------
    //Begin function select all product when qty_remain is > 0
    public function select_all_product_purchased()
    {
        $sql="SELECT p1.purchase_detail_id,
        p1.purchase_id,
        p1.product_id,
        p1.qty_remain,
        p1.vat_rate,
        p1.unit_price,
        p2.product_name        
        FROM tbl_purchase_detail_info p1, 
        tbl_product_info p2 
        WHERE p1.deletion_status='0' and 
        p1.qty_remain > 0 and 
        p1.product_id=p2.product_id
        order by p1.product_id";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all product when qty_remain is > 0
    //--------------------------------------------------------------------------
    //Begin function update Sales Invoice
    public function update_sales_invoice_no($invoice_generated,$sales_id)
    {        
        $sql="UPDATE tbl_sales_info SET s_invoice='$invoice_generated'
                WHERE sales_id='$sales_id'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Sales Information !';        
        return $message;
        }
    }
    //End function update Sales
    //--------------------------------------------------------------------------
    //Begin function select Sales detail by ajax
    public function purchase_detail_by_id($purchase_detail_id)
    {       
        $sql="SELECT * FROM tbl_purchase_detail_info WHERE purchase_detail_id='$purchase_detail_id'";        
        $query_result=$this->connect()->query($sql);
        return $query_result;
    }
    //End function select Sales detail by ajax
    //--------------------------------------------------------------------------
    //Begin function update Sales
    public function update_sales_paid_amnt($total_customer_paid,$paid_amnt,$discount_amnt,$sales_id)
    {
        $due_amnt=$total_customer_paid-$paid_amnt-$discount_amnt;
        $sql="UPDATE tbl_sales_info SET total_customer_paid='$total_customer_paid',                
                paid_amnt='$paid_amnt',
                discount_amnt='$discount_amnt',
                due_amnt='$due_amnt'                
                WHERE sales_id='$sales_id'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Sales Information !';
        //header('Location:manage_purchase.php');
        return $message;
        }
    }
    //End function update Sales
    //--------------------------------------------------------------------------
    //Begin function update Purchase detail qty remain
    public function update_purchase_detail_qty_remain($purchase_detail_id,$qty_sold)
    {        
        $sql="UPDATE tbl_purchase_detail_info SET qty_remain=(qty_remain - $qty_sold)
                WHERE purchase_detail_id='$purchase_detail_id'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Purchase qty remain Information !';
        //header('Location:manage_purchase.php');
        return $message;
        }
    }
    //End function uupdate Purchase detail qty remain
    //--------------------------------------------------------------------------
    //Begin function update Sale detail
    public function update_sale_detail_info($data)
    {
        $sql="UPDATE tbl_sales_detail_info 
                SET product_id='$data[product_id]',                
                unit_price='$data[unit_price]',qty_sold='$data[qty_sold]',
                total_amnt='$data[total_amnt]',vat_amnt='$data[vat_amnt]',
                purchase_detail_id='$data[purchase_detail_id]',status='$data[status]'                
                WHERE sales_detail_id='$data[sales_detail_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Sales detail Information !';
        header('Location:manage_sale_detail.php');
        return $message;
        }
    }
    //End function update Sale detail
    //--------------------------------------------------------------------------
    //Begin function select all Purchase detail ajax by id
    public function purchase_detail_by_ajax($purchase_detail_id)
    {
        $sql="SELECT * FROM tbl_purchase_detail_info WHERE deletion_status='0' and purchase_detail_id='$purchase_detail_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Purchase detail ajax by id
    //--------------------------------------------------------------------------
    //----------------------------END SALES DETAIL------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save Purchase
    public function save_purchase_detail($data)
    {       
        $sql="INSERT INTO tbl_purchase_detail_info (purchase_id,product_id,product_cost,shipment_cost,others_cost,vat_rate,qty_purchased,unit_cost,unit_price,status) 
            VALUES('$data[purchase_id]','$data[product_id]','$data[product_cost]','$data[shipment_cost]','$data[others_cost]','$data[vat_rate]','$data[qty_purchased]','$data[unit_cost]','$data[unit_price]','$data[status]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Purchase Detail Save Successfully !';
                return $message;
            }
    }
    //End function save Purchase    
    //--------------------------------------------------------------------------
    //Begin function update Purchase
    public function update_purchase_invoice_no($invoice_generated,$purchase_id)
    {        
        $sql="UPDATE tbl_purchase_info SET p_invoice='$invoice_generated'
                WHERE purchase_id='$purchase_id'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Purchase Information !';        
        return $message;
        }
    }
    //End function update Purchase
    //--------------------------------------------------------------------------
    //Begin function update Purchase
    public function update_purchase_paid_amnt($total_supplier_paid,$paid_amnt,$purchase_id)
    {
        $due_amnt=$total_supplier_paid-$paid_amnt;
        $sql="UPDATE tbl_purchase_info SET total_supplier_paid='$total_supplier_paid',                
                paid_amnt='$paid_amnt',
                due_amnt='$due_amnt'                
                WHERE purchase_id='$purchase_id'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Purchase Information !';
        //header('Location:manage_purchase.php');
        return $message;
        }
    }
    //End function update Purchase    
    //--------------------------------------------------------------------------
    //Begin function select all Purchase detail by id
    public function select_purchase_detail_by_purchase_id($purchase_id)
    {
        $sql="SELECT * FROM tbl_purchase_detail_info WHERE deletion_status='0' and purchase_id='$purchase_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Purchase detail by id    
    //--------------------------------------------------------------------------
    //Begin function save Purchase
    public function save_purchase($data)
    {       
        $sql="INSERT INTO tbl_purchase_info (supplier_id,date,status,user_name) 
            VALUES('$data[supplier_id]','$data[date]','1','$data[user_name]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Purchase Save Successfully !';
                return $message;
            }
    }
    //End function save Purchase    
    //--------------------------------------------------------------------------
    //Begin function select all Purchase
    public function select_all_purchase()
    {
        $sql="SELECT * FROM tbl_purchase_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Purchase
    //--------------------------------------------------------------------------
    //Begin function select max Purchase ID
    public function select_max_purchase_id($supplier_id,$user_name)
    {       
        $sql="SELECT max(purchase_id) max_id FROM tbl_purchase_info WHERE supplier_id='$supplier_id' and user_name='$user_name'";        
        $query_result=$this->connect()->query($sql);
        return $query_result;
    }
    //End function select max Purchase ID
    //--------------------------------------------------------------------------
    //Begin function select all Purchase with supplier
    public function select_all_purchase_supplier()
    {
        $sql="SELECT p1.purchase_id,p1.supplier_id,p1.date,p1.paid_amnt,
        p1.due_amnt,p1.total_supplier_paid,p1.status,s1.first_name,s1.last_name
        FROM tbl_purchase_info p1,tbl_supplier_info s1 
        WHERE p1.supplier_id=s1.supplier_id and p1.deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Purchase with supplier

    //--------------------------------------------------------------------------
    //Begin function select Manufacturer by id
    public function select_purchase_by_id($purchase_id)
    {
        $sql="SELECT * FROM tbl_purchase_info WHERE purchase_id='$purchase_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select Purchase by id

    //--------------------------------------------------------------------------
    //Begin function update Purchase
    public function update_purchase_info($data)
    {
        $sql="UPDATE tbl_purchase_info 
                SET supplier_id='$data[supplier_id]',                
                date='$data[date]',paid_amnt='$data[paid_amnt]',
                total_supplier_paid='$data[total_supplier_paid]',remarks='$data[remarks]',
                due_amnt='$data[due_amnt]',status='$data[status]'                
                WHERE purchase_id='$data[purchase_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Purchase Information !';
        header('Location:manage_purchase.php');
        return $message;
        }
    }
    //End function update Purchase
    //--------------------------------------------------------------------------
    //Begin function active Purchase
    public function active_purchase($id)
    {
        $sql="UPDATE tbl_purchase_info SET status='1' WHERE purchase_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_purchase.php'); 
    }
    //End function active Purchase
    //--------------------------------------------------------------------------
    //Begin function inactive Purchase
    public function inactive_purchase($id)
    {
        $sql="UPDATE tbl_purchase_info SET status='0' WHERE purchase_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_purchase.php');
    }
    //End function inactive Purchase
    //--------------------------------------------------------------------------
    //Begin function delete Purchase
    public function delete_purchase($id)
    {
        $sql="UPDATE tbl_purchase_info SET deletion_status='1' WHERE purchase_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_purchase.php'); 
    }
    //End function delete Purchase
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function select all purchase detail
    public function select_all_purchase_detail()
    {
        $sql="SELECT * FROM tbl_purchase_detail_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all purchase
    //--------------------------------------------------------------------------
    //Begin function active purchase detail
    public function active_purchase_detail($id)
    {
        $sql="UPDATE tbl_purchase_detail_info SET status='1' WHERE purchase_detail_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_purchase_detail.php'); 
    }
    //End function active purchase detail
    //--------------------------------------------------------------------------
    //Begin function inactive purchase detail
    public function inactive_purchase_detail($id)
    {
        $sql="UPDATE tbl_purchase_detail_info SET status='0' WHERE purchase_detail_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_purchase_detail.php');
    }
    //End function inactive purchase detail
    //--------------------------------------------------------------------------
    //Begin function delete purchase detail
    public function delete_purchase_detail($id)
    {
        $sql="UPDATE tbl_purchase_detail_info SET deletion_status='1' WHERE purchase_detail_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_purchase_detail.php'); 
    }
    //End function delete purchase detail
    //--------------------------------------------------------------------------
    //Begin function select all Purchase detail by id
    public function select_purchase_detail_by_id($purchase_detail_id)
    {
        $sql="SELECT * FROM tbl_purchase_detail_info WHERE deletion_status='0' and purchase_detail_id='$purchase_detail_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Purchase detail by id
    //--------------------------------------------------------------------------
    //Begin function update Purchase
    public function update_purchase_detail_info($data)
    {
        $sql="UPDATE tbl_purchase_detail_info 
                SET purchase_id='$data[purchase_id]',                
                product_id='$data[product_id]',product_cost='$data[product_cost]',
                shipment_cost='$data[shipment_cost]',others_cost='$data[others_cost]',
                qty_purchased='$data[qty_purchased]',qty_remain='$data[qty_remain]',
                unit_cost='$data[unit_cost]',unit_price='$data[unit_price]',
                vat_rate='$data[vat_rate]',status='$data[status]'                
                WHERE purchase_detail_id='$data[purchase_detail_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Purchase Information !';
        header('Location:manage_purchase_detail.php');
        return $message;
        }
    }
    //End function update Purchase  
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save Open Stock
    public function save_open_stock($data)
    {       
        $sql="INSERT INTO tbl_opn_stck_info (mon_yyyy,product_id,stock_in_hand,remarks,status) 
            VALUES('$data[mon_yyyy]','$data[product_id]','$data[stock_in_hand]','$data[remarks]','$data[status]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Open Stock Save Successfully !';
                return $message;
            }
    }
    //End function save Open Stock
    //--------------------------------------------------------------------------
    //Begin function select all Open Stock
    public function select_all_open_stock()
    {
        $sql="SELECT o1.opn_stck_id,o1.mon_yyyy,o1.product_id,p1.product_name,o1.stock_in_hand,o1.remarks,o1.status
        FROM tbl_opn_stck_info o1,tbl_product_info p1 
        WHERE o1.product_id=p1.product_id and o1.deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Open Stock
    //--------------------------------------------------------------------------
    //Begin function update Open Stock
    public function update_open_stock_info($data)
    {
        $sql="UPDATE tbl_opn_stck_info SET mon_yyyy='$data[mon_yyyy]',                
                product_id='$data[product_id]',
                stock_in_hand='$data[stock_in_hand]',
                remarks='$data[remarks]',               
                status='$data[status]'                
                WHERE opn_stck_id='$data[opn_stck_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Open Stock Information !';
        header('Location:manage_open_stock.php');
        return $message;
        }
    }
    //End function update Open Stock
    //--------------------------------------------------------------------------
    //Begin function active Open Stock
    public function active_open_stock($id)
    {
        $sql="UPDATE tbl_opn_stck_info SET status='1' WHERE opn_stck_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_open_stock.php'); 
    }
    //End function active Open Stock
    //--------------------------------------------------------------------------
    //Begin function inactive Open Stock
    public function inactive_open_stock($id)
    {
        $sql="UPDATE tbl_opn_stck_info SET status='0' WHERE opn_stck_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_open_stock.php');
    }
    //End function inactive Open Stock
    //--------------------------------------------------------------------------
    //Begin function delete Open Stock
    public function delete_open_stock($id)
    {
        $sql="UPDATE tbl_opn_stck_info SET deletion_status='1' WHERE opn_stck_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_open_stock.php'); 
    }
    //End function delete Open Stock
    //--------------------------------------------------------------------------
    //Begin function select Open Stock by id
    public function select_open_stock_info_by_id($opn_stck_id)
    {
        $sql="SELECT * FROM tbl_opn_stck_info WHERE opn_stck_id='$opn_stck_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select Open Stock by id    
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save product    
    public function save_product_info($data,$files)
    {
        if($files['product_image']['name'])
        {
            $target_dir = "product_images_folder/";
            $target_file = $target_dir . basename($files["product_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["product_image"]["tmp_name"]);          

            if($check !== false) 
            {
                if($files["product_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["product_image"]["tmp_name"], $target_file)) 
                        {
                            $product_image=$target_file;
                            
                            $sql="INSERT INTO tbl_product_info (product_cat_id,product_code,product_name,rol_qty,qty_stock,status,product_image) 
                            VALUES('$data[product_cat_id]','$data[product_code]','$data[product_name]','$data[rol_qty]','$data[qty_stock]','$data[status]','$product_image')";
                            
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysqli_error());
                            }
                            else
                            {                                
                                $message='Product Information Save Successfully !';
                                return $message;                                
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }            
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }    
    }
    //End function save product
    //--------------------------------------------------------------------------
    //Begin function select all product
    public function select_all_product()
    {
        $sql="SELECT * FROM tbl_product_info WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all product
    //--------------------------------------------------------------------------
    //Begin function select all product when qty is > 0
    public function select_all_product_qty_positive()
    {
        $sql="SELECT * FROM tbl_product_info WHERE deletion_status='0' and qty_stock > 0";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all product when qty is > 0
    //--------------------------------------------------------------------------
    //Begin function select product by id
    public function select_product_info_by_id($product_id)
    {
        $sql="SELECT * FROM tbl_product_info WHERE product_id='$product_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select product by id
    //--------------------------------------------------------------------------
    //Begin function select product name by id
    public function select_product_name_by_id($product_id)
    {
        $sql="SELECT product_name FROM tbl_product_info WHERE product_id='$product_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select product name by id    
    //--------------------------------------------------------------------------
    //Begin function update product
    public function update_product_info($data)
    {
        $sql="UPDATE tbl_product_info SET product_name='$data[product_name]',
                product_cat_id='$data[product_cat_id]',
                rol_qty='$data[rol_qty]',
                qty_stock='$data[qty_stock]',
                status='$data[status]'
                WHERE product_id='$data[product_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Product Information Successfully !';
        header('Location:manage_product_list.php');
        return $message;
        }
    }
    //End function update product
    //--------------------------------------------------------------------------
    //Begin function add product qty
    public function add_product_qty($product_id,$qty_stock)
    {
        $sql="UPDATE tbl_product_info SET qty_stock=(qty_stock+$qty_stock)               
                WHERE product_id=$product_id";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Add Product stock Information Successfully !';       
        return $message;
        }
    }   
    //End function Add product
    //--------------------------------------------------------------------------
    //Begin function Minus product qty
    public function minus_product_qty($product_id,$qty_stock)
    {
        $sql="UPDATE tbl_product_info SET qty_stock=(qty_stock-$qty_stock)               
                WHERE product_id=$product_id";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Add Product stock Information Successfully !';       
        return $message;
        }
    }   
    //End function Add product
    //--------------------------------------------------------------------------
    //Begin function update product
    public function update_product_current_price($product_id,$unit_price)
    {
        $sql="UPDATE tbl_product_info SET current_price=$unit_price               
                WHERE product_id=$product_id";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Product Current Price Successfully !';        
        return $message;
        }
    }
    //End function update product
    //--------------------------------------------------------------------------

    //Begin function active product
    public function active_product($id)
    {
        $sql="UPDATE tbl_product_info SET status='1' WHERE product_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_product_list.php'); 
    }
    //End function active product
    //--------------------------------------------------------------------------
    //Begin function inactive product
    public function inactive_product($id)
    {
        $sql="UPDATE tbl_product_info SET status='0' WHERE product_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_product_list.php'); 
    }
    //End function inactive product
    //--------------------------------------------------------------------------
    //Begin function delete product
    public function delete_product($id)
    {
        $sql="UPDATE tbl_product_info SET deletion_status='1' WHERE product_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_product_list.php'); 
    }
    //End function delete product
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save customer without image   
    public function save_customer_info_without_image($data)
    {
        $sql="INSERT INTO tbl_customer_info (first_name,last_name,email_address,address,date_of_birth,
        contact_no,gender,city,country,status) 
        VALUES('$data[first_name]','$data[last_name]','$data[email_address]',
        '$data[address]','$data[date_of_birth]','$data[contact_no]','$data[gender]',
        '$data[city]','$data[country]',1)";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysqli_error());
        }
        else
        {
            $message='Customer Information Save Successfully !';
            return $message;
        }
    }
    //End function save customer without image
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //Begin function save customer    
    public function save_customer_info($data,$files)
    {
        if($files['customer_image']['name'])
        {
            $target_dir = "customer_images_folder/";
            $target_file = $target_dir . basename($files["customer_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["customer_image"]["tmp_name"]);
            if($check !== false) 
            {
                if($files["customer_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["customer_image"]["tmp_name"], $target_file)) 
                        {
                            $customer_image=$target_file;
                            
                            $sql="INSERT INTO tbl_customer_info (first_name,last_name,email_address,address,date_of_birth,
                            contact_no,gender,city,country,status,customer_image) 
                            VALUES('$data[first_name]','$data[last_name]','$data[email_address]',
                            '$data[address]','$data[date_of_birth]','$data[contact_no]','$data[gender]',
                            '$data[city]','$data[country]','$data[status]','$customer_image')";
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysqli_error());
                            }
                            else
                            {
                                $message='Customer Information Save Successfully !';
                                return $message;
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }
    
    }
    //End function save customer
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //Begin function update customer image file  
    public function update_customer_image_file($data,$files)
    {
        if($files['customer_image']['name'])
        {
            $target_dir = "customer_images_folder/";
            $target_file = $target_dir . basename($files["customer_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["customer_image"]["tmp_name"]);
            if($check !== false) 
            {
                if($files["customer_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["customer_image"]["tmp_name"], $target_file)) 
                        {
                            $customer_image=$target_file;
                            
                            $sql="UPDATE tbl_customer_info SET customer_image='$customer_image' 
                            where customer_id='$data[customer_id]'";
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysqli_error());
                            }
                            else
                            {
                                $message='Customer Image Save Successfully !';
                                return $message;
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }    
    }
    //End function update customer image file
    //--------------------------------------------------------------------------
    //Begin function select all customer
    public function select_all_customer()
    {
        $sql="SELECT * FROM tbl_customer_info WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all customer
    //--------------------------------------------------------------------------
    //Begin function select customer by id
    public function select_customer_info_by_id($customer_id)
    {
        $sql="SELECT * FROM tbl_customer_info WHERE customer_id='$customer_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select customer by id    
    //--------------------------------------------------------------------------    
    //Begin function update customer
    public function update_customer_info($data)
    {
        $sql="UPDATE tbl_customer_info SET first_name='$data[first_name]',
                last_name='$data[last_name]',
                address='$data[address]',
                date_of_birth='$data[date_of_birth]',
                contact_no='$data[contact_no]',
                email_address='$data[email_address]',
                city='$data[city]',
                country='$data[country]',
                status='$data[status]',
                gender='$data[gender]'
                WHERE customer_id='$data[customer_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update customer Information Successfully !';
        header('Location:manage_customer.php');
        return $message;
        }
    }
    //End function update customer
    //--------------------------------------------------------------------------
    //Begin function active customer
    public function active_customer($id)
    {
        $sql="UPDATE tbl_customer_info SET status='1' WHERE customer_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_customer.php'); 
    }
    //End function active customer
    //--------------------------------------------------------------------------
    //Begin function inactive customer
    public function inactive_customer($id)
    {
        $sql="UPDATE tbl_customer_info SET status='0' WHERE customer_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_customer.php'); 
    }
    //End function inactive customer
    //--------------------------------------------------------------------------
    //Begin function delete customer
    public function delete_customer($id)
    {
        $sql="UPDATE tbl_customer_info SET deletion_status='1' WHERE customer_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_customer.php'); 
    }
    //End function delete customer
    //--------------------------------------------------------------------------  
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save Supplier    
    public function save_supplier_info($data,$files)
    {
        if($files['supplier_image']['name'])
        {
            $target_dir = "supplier_images_folder/";
            $target_file = $target_dir . basename($files["supplier_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["supplier_image"]["tmp_name"]);
            if($check !== false) 
            {
                if($files["supplier_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["supplier_image"]["tmp_name"], $target_file)) 
                        {
                            $supplier_image=$target_file;
                            
                            $sql="INSERT INTO tbl_supplier_info (first_name,last_name,email_address,address,date_of_birth,
                            contact_no,gender,city,country,status,supplier_image) 
                            VALUES('$data[first_name]','$data[last_name]','$data[email_address]',
                            '$data[address]','$data[date_of_birth]','$data[contact_no]','$data[gender]',
                            '$data[city]','$data[country]','$data[status]','$supplier_image')";
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysqli_error());
                            }
                            else
                            {
                                $message='Supplier Information Save Successfully !';
                                return $message;
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }
    
    }
    //End function save Supplier
    //--------------------------------------------------------------------------
    //Begin function select all supplier
    public function select_all_supplier()
    {
        $sql="SELECT * FROM tbl_supplier_info WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all supplier
    //--------------------------------------------------------------------------
    //Begin function select supplier by id
    public function select_supplier_info_by_id($supplier_id)
    {
        $sql="SELECT * FROM tbl_supplier_info WHERE supplier_id='$supplier_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select supplier by id    
    //--------------------------------------------------------------------------    
    //Begin function update supplier
    public function update_supplier_info($data)
    {
        $sql="UPDATE tbl_supplier_info SET first_name='$data[first_name]',
                last_name='$data[last_name]',
                address='$data[address]',
                date_of_birth='$data[date_of_birth]',
                contact_no='$data[contact_no]',
                email_address='$data[email_address]',
                city='$data[city]',
                country='$data[country]',
                status='$data[status]',
                gender='$data[gender]'
                WHERE supplier_id='$data[supplier_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Supplier Information Successfully !';
        header('Location:manage_supplier.php');
        return $message;
        }
    }
    //End function update supplier
    //--------------------------------------------------------------------------
    //Begin function active supplier
    public function active_supplier($id)
    {
        $sql="UPDATE tbl_supplier_info SET status='1' WHERE supplier_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_supplier.php'); 
    }
    //End function active supplier
    //--------------------------------------------------------------------------
    //Begin function inactive supplier
    public function inactive_supplier($id)
    {
        $sql="UPDATE tbl_supplier_info SET status='0' WHERE supplier_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_supplier.php'); 
    }
    //End function inactive supplier
    //--------------------------------------------------------------------------
    //Begin function delete supplier
    public function delete_supplier($id)
    {
        $sql="UPDATE tbl_supplier_info SET deletion_status='1' WHERE supplier_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_supplier.php'); 
    }
    //End function delete supplier
    //--------------------------------------------------------------------------  
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save Manufacturer
    public function save_manufacturer($data)
    {
       
        $sql="INSERT INTO tbl_manufact_info (manufact_name,manufact_address,contact_no,manufact_email) 
            VALUES('$data[manufact_name]','$data[manufact_address]','$data[contact_no]','$data[manufact_email]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Manufacturer Save Successfully !';
                return $message;
            }
    }
    //End function save Manufacturer
    //--------------------------------------------------------------------------
    //Begin function select all Manufacturer
    public function select_all_manufacturer()
    {
        $sql="SELECT * FROM tbl_manufact_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Manufacturer
    //--------------------------------------------------------------------------
    //Begin function select Manufacturer by id
    public function select_manufacturer_by_id($manufact_id)
    {
        $sql="SELECT * FROM tbl_manufact_info WHERE manufact_id='$manufact_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select Manufacturer by id
    //--------------------------------------------------------------------------
    //Begin function update Manufacturer
    public function update_manufacturer_info($data)
    {
        $sql="UPDATE tbl_manufact_info SET manufact_name='$data[manufact_name]',                
                manufact_address='$data[manufact_address]',
                contact_no='$data[contact_no]',
                manufact_email='$data[manufact_email]',                
                status='$data[status]'                
                WHERE manufact_id='$data[manufact_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Manufacturer Information !';
        header('Location:manage_manufacturer.php');
        return $message;
        }
    }
    //End function update Manufacturer
    //--------------------------------------------------------------------------
    //Begin function active Manufacturer
    public function active_manufacturer($id)
    {
        $sql="UPDATE tbl_manufact_info SET status='1' WHERE manufact_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_manufacturer.php'); 
    }
    //End function active Manufacturer
    //--------------------------------------------------------------------------
    //Begin function inactive Manufacturer
    public function inactive_manufacturer($id)
    {
        $sql="UPDATE tbl_manufact_info SET status='0' WHERE manufact_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_manufacturer.php');
    }
    //End function inactive supManufacturerplier
    //--------------------------------------------------------------------------
    //Begin function delete Manufacturer
    public function delete_manufacturer($id)
    {
        $sql="UPDATE tbl_manufact_info SET deletion_status='1' WHERE manufact_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_manufacturer.php'); 
    }
    //End function delete Manufacturer
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save Product Category
    public function save_product_category_info($data)
    {       
        $sql="INSERT INTO tbl_product_cat_info (product_cat_name,manufact_id) 
            VALUES('$data[product_cat_name]','$data[manufact_id]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Product Category Save Successfully !';
                return $message;
            }
    }
    //End function save Product Category
    //--------------------------------------------------------------------------
    //Begin function select all product category
    public function select_all_product_category()
    {
        $sql="SELECT * FROM tbl_product_cat_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all product category
    //--------------------------------------------------------------------------
    //Begin function select product category by id
    public function select_product_cat_by_id($product_cat_id)
    {
        $sql="SELECT * FROM tbl_product_cat_info WHERE product_cat_id='$product_cat_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select product category by id
    //--------------------------------------------------------------------------
    //Begin function update product category
    public function update_product_cat_info($data)
    {
        $sql="UPDATE tbl_product_cat_info SET product_cat_name='$data[product_cat_name]',
                status='$data[status]'
                WHERE product_cat_id='$data[product_cat_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update product category Information !';
        header('Location:manage_category.php');
        return $message;
        }
    }
    //End function update  product category
    //--------------------------------------------------------------------------
    //Begin function active product category
    public function active_product_category($id)
    {
        $sql="UPDATE tbl_product_cat_info SET status='1' WHERE product_cat_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_category.php'); 
    }
    //End function active product category
    //--------------------------------------------------------------------------
    //Begin function inactive product category
    public function inactive_product_category($id)
    {
        $sql="UPDATE tbl_product_cat_info SET status='0' WHERE product_cat_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_category.php'); 
    }
    //End function inactive product category
    //--------------------------------------------------------------------------
    //Begin function delete product category
    public function delete_product_category($id)
    {
        $sql="UPDATE tbl_product_cat_info SET deletion_status='1' WHERE product_cat_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_category.php'); 
    }
    //End function delete product category
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------

    //*******************************************************************************/
    //*******************************************************************************/
    //*******************************************************************************/
    //--------------------------------------------------------------------------
    //Begin function select all page
    public function select_all_page()
    {
        $sql="SELECT * FROM tbl_menu WHERE status='1'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all page
    //--------------------------------------------------------------------------
    //Begin function save page content info
    public function save_page_content_info($data)
    {
        $sql="INSERT INTO tbl_page_content (menu_id,page_content) 
            VALUES('$data[menu_id]','$data[page_content]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Page Content Save Successfully !';
                return $message;
            }
    }
    //End function save page content info
    //--------------------------------------------------------------------------
    //Begin function select all page
    public function select_all_page_content()
    {
        $sql="SELECT t1.page_content_id,t1.menu_id,t2.menu_title,t1.page_content,t1.status
              FROM tbl_page_content t1, tbl_menu t2 
              WHERE t1.menu_id=t2.menu_id AND 
              deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all page
    //--------------------------------------------------------------------------
    //Begin function active page content
    public function active_page_content($id)
    {
        $sql="UPDATE tbl_page_content SET status='1' WHERE page_content_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_page_content.php'); 
    }
    //End function active page content
    //--------------------------------------------------------------------------
    //Begin function inactive page content
    public function inactive_page_content($id)
    {
        $sql="UPDATE tbl_page_content SET status='0' WHERE page_content_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_page_content.php');  
    }
    //End function inactive page content
    //--------------------------------------------------------------------------
    //Begin function delete page content
    public function delete_page_content($id)
    {
        $sql="UPDATE tbl_page_content SET deletion_status='1' WHERE page_content_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_page_content.php'); 
    }
    //End function delete page content
    //--------------------------------------------------------------------------
    //Begin function select page content by id
    public function select_page_content_info_by_id($page_content_id)
    {
        $sql="SELECT * FROM tbl_page_content WHERE page_content_id='$page_content_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select page content by id
    //--------------------------------------------------------------------------
    //Begin function update page content
    public function update_page_content_info($data)
    {
        $sql="UPDATE tbl_page_content SET page_content='$data[page_content]'
                WHERE page_content_id='$data[page_content_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Page Content Information Successfully !';
        header('Location:manage_page_content.php');
        return $message;
        }
    }
    //End function update page content
    //--------------------------------------------------------------------------
    //==========================================================================
    //-------------------------------------------------------------------------- 
    //**************************************************************************    
    //Begin function select all menu
    public function select_all_menu()
    {
        $sql="SELECT * FROM tbl_menu WHERE status='1'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all menu
    //--------------------------------------------------------------------------
    //Begin function save front content  
    public function save_front_content($data,$files)
    {
        if($files['front_content_image']['name'])
        {
            $target_dir = "front_image_folder/";
            $target_file = $target_dir . basename($files["front_content_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["front_content_image"]["tmp_name"]);
            if($check !== false) 
            {
                if($files["front_content_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["front_content_image"]["tmp_name"], $target_file)) 
                        {
                            $front_content_image=$target_file;
                            
                            $sql="INSERT INTO tbl_front_content(front_content_title,front_content_description,menu_id,status,front_content_image) 
                            VALUES('$data[front_content_title]','$data[front_content_description]','$data[menu_id]','$data[status]','$front_content_image')";
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysql_error());
                            }
                            else
                            {
                                $message='Front Content Save Successfully !';
                                return $message;
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }
    
    }
    //End function save front content
    //--------------------------------------------------------------------------
    //Begin function select all front content
    public function select_all_front_content()
    {
        $sql="SELECT * FROM tbl_front_content WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all front content
    //--------------------------------------------------------------------------
    //Begin function active front content
    public function active_front_content($id)
    {
        $sql="UPDATE tbl_front_content SET status='1' WHERE front_content_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_front_content.php');  
    }
    //End function active front content
    //--------------------------------------------------------------------------
    //Begin function inactive front content
    public function inactive_front_content($id)
    {
        $sql="UPDATE tbl_front_content SET status='0' WHERE front_content_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_front_content.php');   
    }
    //End function inactive front content
    //--------------------------------------------------------------------------
    //Begin function delete front content
    public function delete_front_content($id)
    {
        $sql="UPDATE tbl_front_content SET deletion_status='1' WHERE front_content_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_front_content.php'); 
    }
    //End function delete front content
    //--------------------------------------------------------------------------
    //Begin function select front content by id
    public function select_front_content_info_by_id($front_content_id)
    {
        $sql="SELECT * FROM tbl_front_content WHERE front_content_id='$front_content_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select front content by id
    //--------------------------------------------------------------------------
    //Begin function update front content
    public function update_front_content_info($data)
    {
        $sql="UPDATE tbl_front_content
                SET front_content_title='$data[front_content_title]',
                    front_content_description='$data[front_content_description]',
                    menu_id='$data[menu_id]',
                    status='$data[status]'
                WHERE front_content_id='$data[front_content_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Front Content Information Successfully !';
        header('Location:manage_front_content.php');
        return $message;
        }
    }
    //End function update front content
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------     
    //Begin function save logo   
    public function save_logo($data,$files)
    {
        if($files['logo_image']['name'])
        {
            $target_dir = "logo_folder/";
            $target_file = $target_dir . basename($files["logo_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["logo_image"]["tmp_name"]);
            if($check !== false) 
            {
                if($files["logo_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["logo_image"]["tmp_name"], $target_file)) 
                        {
                            $logo_image=$target_file;
                            
                            $sql="INSERT INTO tbl_logo (status,logo_image) 
                            VALUES('$data[status]','$logo_image')";
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysql_error());
                            }
                            else
                            {
                                $message='Logo Image Save Successfully !';
                                return $message;
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }
    
    }
    //End function save logo    
    //--------------------------------------------------------------------------
    //Begin function select all logo
    public function select_all_logo()
    {
        $sql="SELECT * FROM tbl_logo WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all logo
    //--------------------------------------------------------------------------
    //Begin function active logo
    public function active_logo($id)
    {
        $sql="UPDATE tbl_logo SET status='1' WHERE logo_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_logo.php'); 
    }
    //End function active logo
    //--------------------------------------------------------------------------
    //Begin function inactive logo
    public function inactive_logo($id)
    {
        $sql="UPDATE tbl_logo SET status='0' WHERE logo_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_logo.php');  
    }
    //End function inactive logo
    //--------------------------------------------------------------------------
    //Begin function delete logo
    public function delete_logo($id)
    {
        $sql="UPDATE tbl_logo SET deletion_status='1' WHERE logo_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_logo.php'); 
    }
    //End function delete logo
    //--------------------------------------------------------------------------
    //Begin function select logo by id
    public function select_logo_info_by_id($logo_id)
    {
        $sql="SELECT * FROM tbl_logo WHERE logo_id='$logo_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select logo by id
    //--------------------------------------------------------------------------
    //Begin function update logo
    public function update_logo_info($data,$files)
    {
        if($files['logo_image']['name'])
        {
            $target_dir = "logo_folder/";
            $target_file = $target_dir . basename($files["logo_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($files["logo_image"]["tmp_name"]);
            if($check !== false) 
            {
                if($files["logo_image"]["size"] < 500000) 
                {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    }
                    else
                    {
                        if (move_uploaded_file($files["logo_image"]["tmp_name"], $target_file)) 
                        {
                            $logo_image=$target_file;
                            
                            $sql="UPDATE tbl_logo SET logo_image='$logo_image'
                                    WHERE logo_id='$data[logo_id]'";
                            if(!$this->connect()->query($sql))
                            {
                                die('SQL Error:'.  mysql_error());
                            }
                            else{
                            $message='Update Logo Information Successfully !';
                            header('Location:manage_logo.php');
                            return $message;
                            }
                        } 
                        else 
                        {
                            $message= "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                }
                else
                {
                    $message= "Sorry, your file is too large.";
                    return $message;
                }
            } else 
            {
                $message= "File is not an image.";
                return $message;
            }
        }
        else
        {
            $message='Image file not selected';
            return $message;
        }
    }
    //End function update logo
    //--------------------------------------------------------------------------
    //==========================================================================
    //-------------------------------------------------------------------------- 
    //Begin function select all footer
    public function select_all_footer()
    {
        $sql="SELECT * FROM tbl_footer WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all footer
    //--------------------------------------------------------------------------
    //Begin function save footer
    public function save_footer($data)
    {
        $sql="INSERT INTO tbl_footer (footer_content,status) 
            VALUES('$data[footer_content]','$data[status]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Footer Content Save Successfully !';
                return $message;
            }
    }
    //End function save footer  
    //--------------------------------------------------------------------------
    //Begin function active footer
    public function active_footer($id)
    {
        $sql="UPDATE tbl_footer SET status='1' WHERE footer_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_footer.php'); 
    }
    //End function active footer
    //--------------------------------------------------------------------------
    //Begin function inactive footer
    public function inactive_footer($id)
    {
        $sql="UPDATE tbl_footer SET status='0' WHERE footer_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_footer.php');  
    }
    //End function inactive notice
    //--------------------------------------------------------------------------
    //Begin function delete footer
    public function delete_footer($id)
    {
        $sql="UPDATE tbl_footer SET deletion_status='1' WHERE footer_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_footer.php'); 
    }
    //End function delete footer
    //--------------------------------------------------------------------------
    //Begin function select footer by id
    public function select_footer_by_id($footer_id)
    {
        $sql="SELECT * FROM tbl_footer WHERE footer_id='$footer_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select footer by id
    //--------------------------------------------------------------------------
    //Begin function update footer
    public function update_footer($data)
    {
        $sql="UPDATE tbl_footer
                SET footer_content='$data[footer_content]',
                    status='$data[status]'
                WHERE footer_id='$data[footer_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Footer Information Successfully !';
        header('Location:manage_footer.php');
        return $message;
        }
    }
    //End function update footer
    //--------------------------------------------------------------------------
    //==========================================================================
    //-------------------------------------------------------------------------- 
    public function update_customer_without_image($data)
    {
        $sql="UPDATE tbl_customer_info SET first_name='$data[first_name]',
                last_name='$data[last_name]',
                address='$data[address]',
                date_of_birth='$data[date_of_birth]',
                contact_no='$data[contact_no]',
                city='$data[city]',
                country='$data[country]',
                status='$data[status]',
                gender='$data[gender]'
                WHERE customer_id='$data[customer_id]'";

            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else{
                $message='Update Customer Information Successfully !';
                header('Location:manage_customer.php');
                return $message;
            }
    }
    //End function update customer
    //--------------------------------------------------------------------------
    //==========================================================================
    //-------------------------------------------------------------------------- 
    //Begin function select Supplier by id
    public function supplier_id_ajax_search($supplier_id)
    {
        $sql="SELECT * FROM tbl_supplier_info WHERE supplier_id='$supplier_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select Supplier by id
    //--------------------------------------------------------------------------
    //Begin function select student by ajax search
    // public function supplier_id_ajax_search_2($class_id,$education_year_id)
    // {
    //     $sql="SELECT a1.*,s1.student_id,s1.first_name,s1.last_name FROM tbl_admission a1,tbl_student s1
    //             WHERE a1.class_id='$class_id' AND a1.education_year_id='$education_year_id'
    //             AND s1.student_id=a1.student_id";
    //     $query_result= $this->connect()->query($sql);
    //     return $query_result; 
    // }
    //End function select student by ajax search
    //--------------------------------------------------------------------------
    //==========================================================================
    //-------------------------------------------------------------------------- 
    //Begin function save admin user
    public function save_user($data)
    {
        $password='';
        //$password=  md5($data['admin_password']);
        $sql="INSERT INTO tbl_admin (admin_name,admin_email_address,admin_password,access_level) 
            VALUES('$data[admin_name]','$data[admin_email_address]','$password','$data[access_level]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Admin User Save Successfully !';
                return $message;
            }
    }
    //End function save admin user
    //--------------------------------------------------------------------------
    //Begin function select all admin user
    public function select_all_admin_user()
    {
        $sql="SELECT * FROM tbl_admin WHERE deletion_status='0'";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select all admin user
    //--------------------------------------------------------------------------
    //Begin function delete admin user
    public function delete_user($id)
    {
        $sql="UPDATE tbl_admin SET deletion_status='1' WHERE admin_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_user.php'); 
    }
    //End function delete admin user
    //--------------------------------------------------------------------------
    //Begin function select admin user by id
    public function select_user_by_id($user_id)
    {
        $sql="SELECT * FROM tbl_admin WHERE admin_id='$user_id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select admin user by id
    //--------------------------------------------------------------------------
    //Begin function update admin user
    public function update_user($data)
    {
        $password='';
        $password=  md5($data['admin_password']);
        $sql="UPDATE tbl_admin
                SET admin_name='$data[admin_name]',
                    admin_email_address='$data[admin_email_address]',
                    admin_password='$password',
                    access_level='$data[access_level]'
                WHERE admin_id='$data[admin_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Admin User Information Successfully !';
        header('Location:manage_user.php');
        return $message;
        }
    }
    //End function update admin user
    //--------------------------------------------------------------------------      
    //==========================================================================    
    //-------------------------------------------------------------------------- 
    //Begin function save company
    public function save_company_info($data)
    {        
        $sql="INSERT INTO tbl_company_info (company_name,company_address,company_contact,status) 
            VALUES('$data[company_name]','$data[company_address]','$data[company_contact]','$data[status]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Company Info Save Successfully !';
                return $message;
            }
    }
    //End function save company
    //--------------------------------------------------------------------------
    //Begin function select company Info
    //--------------------------------------------------------------------------
    public function select_company_info()
    {
        $sql="SELECT * FROM tbl_company_info WHERE deletion_status='0' ";
        $query_result= $this->connect()->query($sql);
        return $query_result;
    }
    //End function select company Info
    //--------------------------------------------------------------------------
    //Begin function select company id
    public function select_company_by_id($id)
    {
        $sql="SELECT * FROM tbl_company_info WHERE id='$id'";
        $query_result= $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select company id
    //--------------------------------------------------------------------------
    //Begin function update company
    public function update_company_info($data)
    {
        $sql="UPDATE tbl_company_info
                SET company_name='$data[company_name]',
                    company_address='$data[company_address]',
                    company_contact='$data[company_contact]'                    
                WHERE id='$data[id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Update Company Information Successfully !';
        header('Location:manage_company_info.php');
        return $message;
        }
    }
    //End function update company
    //--------------------------------------------------------------------------
    //Begin function active company
    public function active_company_info($id)
    {
        $sql="UPDATE tbl_company_info SET status='1' WHERE id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_company_info.php'); 
    }
    //End function active company
    //--------------------------------------------------------------------------
    //Begin function inactive company
    public function inactive_company_info($id)
    {
        $sql="UPDATE tbl_company_info SET status='0' WHERE id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_company_info.php');  
    }
    //End function inactive company    
    //--------------------------------------------------------------------------
    //Begin function delete company
    public function delete_company_by_id($id)
    {
        $sql="UPDATE tbl_company_info SET deletion_status='1' WHERE id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_company_info.php'); 
    }
    //End function delete company
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save Supplier Payment
    public function save_supplier_payment($data)
    {
        $sql="INSERT INTO tbl_supplier_payment_info (supplier_id,date,amnt_paid,remarks,status) 
            VALUES('$data[supplier_id]','$data[date]','$data[amnt_paid]','$data[remarks]','$data[status]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Supplier Payment Save Successfully !';
                return $message;
            }
    }
    //End function save Supplier Payment   
    //--------------------------------------------------------------------------
    //Begin function select all Supplier Payment
    public function select_all_supplier_payment()
    {
        $sql="SELECT * FROM tbl_supplier_payment_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all Supplier Payment    
    //--------------------------------------------------------------------------
    //Begin function select Supplier Payment by id
    public function select_supplier_payment_by_id($supplier_payment_id)
    {
        $sql="SELECT * FROM tbl_supplier_payment_info WHERE supplier_payment_id='$supplier_payment_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select Supplier Payment by id

    //--------------------------------------------------------------------------
    //Begin function update Supplier Payment
    public function update_supplier_payment_info($data)
    {
        $sql="UPDATE tbl_supplier_payment_info SET supplier_id='$data[supplier_id]',                
                date='$data[date]',
                amnt_paid='$data[amnt_paid]',
                remarks='$data[remarks]',                
                status='$data[status]'                
                WHERE supplier_id='$data[supplier_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Supplier Payment Information !';
        header('Location:manage_supplier_payment.php');
        return $message;
        }
    }
    //End function update Supplier Payment
    //--------------------------------------------------------------------------
    //Begin function active Supplier Payment
    public function active_supplier_payment($id)
    {
        $sql="UPDATE tbl_supplier_payment_info SET status='1' WHERE supplier_payment_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_supplier_payment.php'); 
    }
    //End function active Supplier Payment
    //--------------------------------------------------------------------------
    //Begin function inactive Supplier Payment
    public function inactive_supplier_payment($id)
    {
        $sql="UPDATE tbl_supplier_payment_info SET status='0' WHERE supplier_payment_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_supplier_payment.php');
    }
    //End function inactive Supplier Payment
    //--------------------------------------------------------------------------
    //Begin function delete Supplier Payment
    public function delete_supplier_payment($id)
    {
        $sql="UPDATE tbl_supplier_payment_info SET deletion_status='1' WHERE supplier_payment_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_supplier_payment.php'); 
    }
    //End function delete Supplier Payment
    //--------------------------------------------------------------------------
    //==========================================================================
    //--------------------------------------------------------------------------
    //Begin function save customer Payment
    public function save_customer_payment($data)
    {
        $sql="INSERT INTO tbl_customer_payment_info (customer_id,date,amnt_paid,remarks,status) 
            VALUES('$data[customer_id]','$data[date]','$data[amnt_paid]','$data[remarks]','$data[status]')";
            if(!$this->connect()->query($sql))
            {
                die('SQL Error:'.  mysql_error());
            }
            else
            {
                $message='Customer Payment Save Successfully !';
                return $message;
            }
    }
    //End function save customer Payment    
    //--------------------------------------------------------------------------
    //Begin function select all customer Payment
    public function select_all_customer_payment()
    {
        $sql="SELECT * FROM tbl_customer_payment_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all customer Payment    
    //--------------------------------------------------------------------------
    //Begin function select customer Payment by id
    public function select_customer_payment_by_id($customer_payment_id)
    {
        $sql="SELECT * FROM tbl_customer_payment_info WHERE customer_payment_id='$customer_payment_id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select customer Payment by id
    //--------------------------------------------------------------------------
    //Begin function update customer Payment
    public function update_customer_payment_info($data)
    {
        $sql="UPDATE tbl_customer_payment_info SET customer_id='$data[customer_id]',                
                date='$data[date]',
                amnt_paid='$data[amnt_paid]',
                remarks='$data[remarks]',                
                status='$data[status]'                
                WHERE customer_id='$data[customer_id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Customer Payment Information !';
        header('Location:manage_customer_payment.php');
        return $message;
        }
    }
    //End function update customer Payment
    //--------------------------------------------------------------------------
    //Begin function active customer Payment
    public function active_customer_payment($id)
    {
        $sql="UPDATE tbl_customer_payment_info SET status='1' WHERE customer_payment_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_customer_payment.php'); 
    }
    //End function active customer Payment
    //--------------------------------------------------------------------------
    //Begin function inactive customer Payment
    public function inactive_customer_payment($id)
    {
        $sql="UPDATE tbl_customer_payment_info SET status='0' WHERE customer_payment_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_customer_payment.php');
    }
    //End function inactive customer Payment
    //--------------------------------------------------------------------------
    //Begin function delete customer Payment
    public function delete_customer_payment($id)
    {
        $sql="UPDATE tbl_customer_payment_info SET deletion_status='1' WHERE customer_payment_id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_customer_payment.php'); 
    }
    //End function delete customer Payment
    //--------------------------------------------------------------------------
    //==========================================================================
    //-----------------------------------Return Sale----------------------------    
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
                $message='Sales Return Save Successfully !';
                return $message;
            }
    }
    //End function save Return Sale   
    //==========================================================================
    //--------------------------------------------------------------------------   
    //Begin function save Return Sale
    public function save_sale_return($data)
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
    //Begin function select all return sale
    public function select_all_return_sale()
    {
        $sql="SELECT * FROM  tbl_return_sales_info WHERE deletion_status='0'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all return sale
    //--------------------------------------------------------------------------
    //Begin function delete return sale
    public function delete_return_sales($id)
    {
        $sql="UPDATE tbl_return_sales_info SET deletion_status='1' WHERE id='$id'";
        $this->connect()->query($sql);
        header('Location:manage_return_sale.php'); 
    }
    //End function delete return sale
    //--------------------------------------------------------------------------
    //Begin function update return sale
    public function update_return_sale_info($data)
    {
        $sql="UPDATE tbl_return_sales_info SET date='$data[date]',
                sales_detail_id='$data[sales_detail_id]',
                purchase_detail_id='$data[purchase_detail_id]',
                qty_return='$data[qty_return]',
                product_id='$data[product_id]'                
                WHERE id='$data[id]'";
        if(!$this->connect()->query($sql))
        {
            die('SQL Error:'.  mysql_error());
        }
        else{
        $message='Successfully update Return Sale Information !';
        header('Location:manage_return_sale.php');
        return $message;
        }
    }
    //End function update return sale
    //--------------------------------------------------------------------------
    //Begin function select all return sale
    public function select_all_return_sale_by_id($id)
    {
        $sql="SELECT * FROM  tbl_return_sales_info WHERE id='$id'";
        $query_result=  $this->connect()->query($sql);
        return $query_result; 
    }
    //End function select all return sale
    //-------------------------------------------------------------------------- 
    //Begin function logout
    public function logout()
    {
        session_destroy();
        session_start();
        $_SESSION['message']='You Are Successfully Logout !';
        header('Location:index.php');
    }
    //End function logout
    //--------------------------------------------------------------------------  
    //==========================================================================
}