<?php
/**
 * 跳转控制器
 * by 周岩
 */

class IndexAction extends Action {
	public function index(){
		$this->uname = session('uname');
		$this->utype=session('utype');
		$this->uid = session('uid');
		$this->hd=M()->query("select * from books limit 6");
		$this->zhan=M()->query("select * from books  limit 4");
		$this->zhan2=M()->query("select * from books order by bno desc limit 4");
		$this->zhan3=M()->query("select * from detail limit 15");
		$this->display();
	}
	public function signup(){
		$this->display();
	}
	public function insertsignup(){
		$findexist = M()->query("select * from users where umobile = '%s'",I('mobile'));
		if(count($findexist) > 0){
			$data["status"] = 2;
			$this->ajaxReturn($data,'json');
		}

		$insertflag = M()->execute("insert into users values(null,'%s','%s','%s',%d,%d)",I('mobile'),I('passwd'),I('addr'),0,0);

		if($insertflag){
			$data["status"] = 1;
		}else{
			
			$data["status"] = 0;
		}

		$this->ajaxReturn($data,'json');
	}


	public function signupsuccess(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}
	public function bypageshow(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->utype=session('utype');
		$this->rm=M()->query("select * from books order by bnum desc limit 7");
		if(I('btype')!='0'&&I('btype')!='10')
			$this->books = M()->query("select * from books where btype='%s'",I('btype'));
		else if(I('btype')=='10')
			$this->books=M()->query("select * from books where bname like '%沙发%'");
		else if(I('btype')=='0')
			$this->books = M()->query("select * from books");
		$this->productNum = count($this->books);
		$this->display();
	}

	public function login(){
		$this->display();
	}


	public function insertlogin(){
		$usernumber = I('logname');
		$password = I('logpasswd');
		$susermodel = new Model();
		$suser = $susermodel->query("select * from users where umobile = '%s' and upasswd = '%s'", $usernumber, $password);
		if(count($suser) == 1)
		{
				$data['status']=1;
				session('uid', $usernumber);
				session('uname', $suser[0]['uname']);
				session('utype',$suser[0]['utype']);
				$this->ajaxReturn($data,'json');
		}else{
			$data['status'] = 0;
			$this->ajaxReturn($data,'json');
		}
	}
	public function quit(){
		session('uid',null);
		session('utype',null);
		session('uname',null);
		header("Location: http://localhost/shop/index.php/index/index/index.html"); 
	}


	public function lookorderform(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->dd=M()->query("select count(*) as bno,cnt,bname,bimg,bpsd,sum(bprice) as bprice from car,books where umobile='%s' and car.bno=books.bno group by car.bno",$this->uid);
		
		$this->Price=0;
		for($i=0;$i<count($this->dd);$i++)
		{
			$this->Price=$this->Price+$this->dd[$i]['bprice'];
		}
		$this->yue=M()->query("select * from users where umobile='%s'",$this->uid);
		$this->display();
	}	
	public function result(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}	public function server(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}	
	public function showdetail(){
		$this->uname = session('uname');
		$this->utype=session('utype');
		$this->uid = session('uid');
		$this->bno = I('bno');
		$this->rd=M()->query("select * from books order by bnum desc limit 2");
		$this->zs=M()->query("select * from books where bno='%d'",I('bno'));
		$this->KC=$this->zs[0]['bkc'];
		$this->display();
	}
	public function lookshoppingcar(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		
		$this->cars=M()->query("select count(*) as cnt,bname,bimg,bpsd,sum(bprice) as sumprice,bprice,car.bno as cbno,bnum,bkc  from car,books where umobile='%s' and car.bno=books.bno group by car.bno",session('uid'));
		$this->Price=0;
		$this->num=count($this->cars);
		for($i=0;$i<count($this->cars);$i++)
		{
			$this->Price=$this->Price+$this->cars[$i]['sumprice'];
		}
		$this->display();
	}
	
	public function addToCar(){

		$insertflag = M()->execute("insert into car values(null,%d,%d,'%s')",(int)I('bno'),1,session('uid'));
	
		if($insertflag)
			$data['status'] = 1;
		else 
			$data["status"] = 0;
		$this->ajaxReturn($data,'json');
	}
    public function delfromcar(){
		$delflag=M()->execute("delete from car where bno=%d and umobile='%s'",(int)I('bno'),session('uid'));
		
		header("Location: http://localhost/shop/index.php/index/index/lookShoppingCar.html");
	}
	public function showsearch(){
		$this->uname = session('uname');
		$this->utype=session('utype');
		$this->uid = session('uid');
		$searchKey = I('key');
		$this->rm=M()->query("select * from books order by bnum desc limit 3");
		$this->searchBooks = M()->query("select * from books where bname like '%".I('key')."%'"); //不能用$this->books,因为上面有过$this->books了
		// php 字符串相加要用点号，不能用加号！
		$this->searchNum = count($this->searchBooks);
		$this->display();
	}
	public function insertadd(){
		//加入收货地址
		$insertaddflag=M()->execute("insert into receiver values('%s','%s','%s','%s','%s')",session('uid'),I('rno'),I('rname'),I('radd'),I('rid'));
		if($insertaddflag)
			$data['status'] = 1;
		else 
			$data["status"] = 0;
		$this->ajaxReturn($data,'json');
	}
	

	public function submitbuy(){
		$uid = session("uid");
		$cars=M()->query("select count(*) as cnt,bname,bimg,btype,bpsd,sum(bprice) as bprice,car.bno as cbno,bnum,bkc  from car,books where umobile='%s' and car.bno=books.bno group by car.bno",$uid);
		$Price=0;
		$num=count($cars);
		for($i=0;$i<count($cars);$i++)
		{
			$Price=$Price+$cars[$i]['bprice'];
		}

		

		$thisuser = M()->query("select * from users where umobile = '%s'",$uid);
		if(count($thisuser)>0){
			$balance = $thisuser[0]["ubalance"];
		}else{
			$balance = 0;
		}
		
		for($i = 0;$i<count($cars);$i++){//判断库存
			$bno = $cars[$i]["cbno"];
			$cnt = $cars[$i]["cnt"];
			$bkucun = M()->query("select * from books where bno = %d",$bno);
			$bkucun = $bkucun[0]["bkc"];
			if($bkucun < $cnt){
				$data["status"] = 3;//库存不够
				$this->ajaxReturn($data,'json');
			}
		}
		if($Price==0)
		{
			$data["status"]=4;//没买商品
			$this->ajaxReturn($data,'json');
		}
		if($balance > $Price){
			for($i = 0;$i<count($cars);$i++){//更新库存
				$bno = $cars[$i]["cbno"];
				$cnt = $cars[$i]["cnt"];
				$bnum = $cars[$i]["bnum"];
				$bkucun = $cars[$i]["bkc"];
				$btype=$cars[$i]["btype"];
				$bprice=$cars[$i]["bprice"];
				$char=M()->query("select * from chart where btype=%d",$btype);
				$Sales=$char[0]["sales"];
				$Amount=$char[0]["amount"];
				$ukucun = M()->execute("update books set bkc = %d where bno = %d",$bkucun - $cnt,$bno);
				$ukucun = M()->execute("update books set bnum = %d where bno = %d",$bnum + $cnt,$bno);
				$uchart=M()->execute("update chart set amount=%d where btype=%d",$Amount+$cnt,$btype);
				$uuchart=M()->execute("update chart set sales=%d where btype=%d",$Sales+$bprice,$btype);
				$oinsert = M()->execute("insert into orderform values(null,%d,%d,'%s')",$bno,$cnt,$uid);
				$dcar = M()->execute("delete from car where umobile = '%s'",$uid);
			}
			$update = M()->execute("update users set ubalance = %d where umobile = '%s'",$balance-$Price,$uid);

			if($update){
				$data["status"] = 1;
			}else{
				$data["status"] = 2;
			}
		}else{
			$data["status"] = 0;
		}
		$this->ajaxReturn($data,'json');
	}

	public function top()
	{
		
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}

	public function inserttop(){
		
		$nowbalance = M()->query("select * from users where umobile = '%s'",session("uid"));
		$nowbalance = $nowbalance[0]["ubalance"];
		$topinsert = M()->execute("update users set ubalance = %d where umobile = '%s'",$nowbalance + (int)I('money'),session('uid'));
		if($topinsert){
			$data["status"] = 1; 
		}else{
			$data["status"]  =0;
		}
		$this->ajaxReturn($data,'json');
	}
	public function lookOrder(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->orders=M()->query("select  *   from orderform,books where umobile='%s' and orderform.bno=books.bno ",session('uid'));
		
		$this->display();
	}
	public function delfromorder(){
		
		$insertk=M()->execute("insert into tuikuan values(null,%d,%d,%s)",(int)I('bno'),(int)I('cnt'),session('uid'));
		$delflag2=M()->execute("delete from orderform where ono=%d and bno=%d and umobile='%s'",(int)I('ono'),(int)I('bno'),session('uid'));
		header("Location: http://localhost/shop/index.php/index/index/lookOrder.html");
	}
	
	public function addb(){

		$this->display();
	}
	public function addsp(){
		$insertsp = M()->execute("insert into books values(null,'%s',%d,'%s',%d,'%s','%s',%d,'%s','%s','%s','%s','%s')",I('spname'),0,I('tpdz'),I('spjg'),1,0,I('kcl'),I('psd'),I('gj'),I('cd'),I('pp'),I('js'));
		if($insertsp){
			$data["status"]=1;
		}else{
			$data["status"]=0;
		}
		$this->ajaxReturn($data,'json');
	}
	public function delsp(){
		$delsp=M()->execute("delete from books where bno=%d",I('bno'));
		if($delsp){
			$data["status"]=1;
		}else{
			$data["status"]=0;
		}
		$this->ajaxReturn($data,'json');
	}
	public function chart(){
		$this->datas=M()->query("select * from chart");
		$this->sales1=$this->datas[0]['sales'];
		$this->sales2=$this->datas[1]["sales"];
		$this->sales3=$this->datas[2]["sales"];
		$this->sales4=$this->datas[3]["sales"];
		$this->amount1=$this->datas[0]["amount"];
		$this->amount2=$this->datas[1]["amount"];
		$this->amount3=$this->datas[2]["amount"];
		$this->amount4=$this->datas[3]["amount"];
		$this->display();
	}
	public function sjlookorder(){
		$this->sjorders=M()->query("select  *   from orderform,books where   orderform.bno=books.bno ");
		$this->display();
	}
	public function address(){
		$this->add=M()->query("select * from receiver where ryhm='%s'",I('umobile'));
		$this->display();
	}
	public function tuikuan(){
		$this->tk=M()->query("select  *   from tuikuan,books where   tuikuan.tn=books.bno ");
		$this->display();
	}
	public function detail(){
		$this->display();
	}
	public function insertDetail(){
		$insertde=M()->execute("insert into detail values(null,'%s','%s')",I('type'),I('meg'));
		if($insertde){
			$data["status"]=1;
		}else{
			$data["status"]=0;
		}
		$this->ajaxReturn($data,'json');
	}
}