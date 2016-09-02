# LearnPHP
王飞同学的学习记录

身为狮虎的我（咳咳~） 

**2016年08月26日**

      1.写一个页面server.php，并输出至少5个$_SERVER内的元素信息，并说明是什么含义，页面表现形式如下：
            元素名称
            使用形式
            结果
            含义
            PHP_SELF
            $_SERVER[‘PHP_SELF’]
            /test/$_SERVER.php
            表示本网页路径
    
      2.写一个表单，用来填写“用户信息”，要求出现所有的表单元素类型：
            文本框，密码框，单选，复选，下拉，文本域，隐藏域
            提交后显示用户所填写的所有数据。
    
      3。找出至少3个魔术常量和至少5个预定义常量，并输出其值
    
      4.用一个php文件，来实现基本计算器功能：
            下拉列表中有如下符号： +   -   *   /   %
      
      5.手算如下进制转换：
            十进制的23，转为2进制，8进制，16进制
            十进制的234，转为2进制，8进制，16进制
            2进制”1010101”转为10进制
            8进制”765”转为10进制
            16进制”1A2B”转为10进制
            并用系统函数验证自己手算的结果是否正确
    
      6.使用一个表单，输入任意数字，使之可以在2，8，16进制到10进制或10进制到2，8，16进制之间转换，形式大致如下如下：
    
          提示：使用进制转换函数，比如bindec(), decbin();
        （尽量只用一个网页来完成 ）
    
    
      7.输出ASCII码的所有可见字符（编码为32-126的字符）
         提示：chr( n )可以获得编码为n的字符
    
    
      8.使用任何形式定义一个数组，要求使用3种形式输出该数组的所有键和值
          提示：foreach, print_r, var_dump
          


**2016年08月29日:**

        1. 写一个函数，该函数可以将给定的任意个数的参数以指定的字符串串接起来成为一个长的字符串。该函数带2个或2个以上参数，其中第一个参数是用于将其他参数进行串联的连接字符串。比如调用该函数：
          chuanlian(“-”, “ab”, “cd”, “123”);	//得到结果为字符串：”ab-cd-123”
          
        2. 使用递归法和递推法（迭代法）求n的阶层（n为任意给定的大于等于1的整数）
        
        3. 实现冒泡排序和快速排序
        
        4. 请写一个函数，函数带一个参数（作为数组），函数的功能是找出该数组中的“第二大值”（即函数会返回一个值，此值是该数组的第二大的数值

        5. 设计一个“电子商城”网站的数据库，使用utf8编码
               该数据库至少包括如下表信息：
                   商品类型表：         
                            用于存储商品的分类名称
                   商品表:             
                            用于存储商品的基本信息，其中每个商品必定隶属于某个类型
                   用户表，            
                            用于存储用户的基本信息，其中用户名不能重复不能为空
                   订单表：             
                            用于存储每个用户的每次购买记录
                   订单内容表：           
                            用于存储一份定单的若干个商品信息
                   创建一个“账户”视图：  
                            其中只有用户名和密码信息，并按用户名有序排列好
                            
                   使用insert into在每个表插入一些数据（10条以内即可）——注意数据的合理性问题
                 
                   在php网页中将所有这些表和视图的数据显示在一个网页上，最好显示的时候也显示字段
                   
                   
**2016年08月31日:**

        1. 学生表: ID  姓名  性别  籍贯  院系ID
           院系表: ID  名称  地址  电话
           
           要求：
               查出“计算机系”的所有学生信息
               查出“张仕传”所在的院系信息
               查出在“行政楼”办公的院系名称
               查出男生女生各多少人
               查出人数最多的院系信息
               查出人数最多的院系的男女生各多少人
               查出跟“王飞”同籍贯的所有人
               查出有“河北”人就读的院系信息
               查出跟“河北女生”同院系的所有学生的信息
           
               
        2. 观察实验：
                在命令行中启动一个事务，在事务中写两条insert或delete或update语句
                在执行完该2条语句后，先不执行commit，通过phpMyAdmin来观察语句是否生效
                然后再执行commit或rollback语句，再用phpMyAdmin观察结果


        3. 设计一个存款表，至少包含账户和资金字段。并设计一个网页，实现账户之间的资金拨转
           注意考虑转账时的各种因素（一致性，资金是否充足，账户是否存在）
           
           
        4. 创建一个存储过程，带3个参数，调用该存储过程，可以将此3个参数作为数据写入的某个表中
        
        
        5. 创建一个存储函数，带3个参数，调用该存储函数，可以将此3个参数作为数据写入的某个表中
        
        
        6. 创建一个存储过程，带3个int参数。调用此存储过程，可以求出它们中的最大值
        
        
        7. 创建一个存储函数，带3个int参数。调用此存储函数，可以求出它们中的最大值
        
    
**2016年09月2日:**

        1. 定义一个“教师类”，并由此类实例化两个“教师对象”。该类至少包括3个属性，3个方法，其中有个方法是“自我介绍”，就能够把自身的所有信息显示出来
        
        2. 定义一个“学生类”，并由此类实例化两个“学生对象”。该类包括姓名，性别，年龄等基本信息，并至少包括一个静态属性（表示总学生数）和一个常量，以及包括构造方法和析构方法
           该对象还可以调用一个方法来进行“自我介绍”（显示其中的所有属性和常量）
           构造方法可以自动初始化一个学生的基本信息，并显示“ｘｘ加入学校，当前有xx个学生”
           
        3. 设计如下几个类：
               商品类，有名称，有价钱，库存数，可显示自身信息（名称，价钱）
               手机类，是商品的一种，并且有品牌，有产地，可显示自身信息
               图书类，是商品的一种，有作者，有出版社，可显示自身信息
               创建一个手机对象，并显示其自身信息
               创建一个图书对象，并显示其自身信息
               
        4. 设计一个“mysql数据库操作类”，要求：
               设计该类的必要属性
                   可以创建数据库对象的同时并返回连接后的资源（或连接失败信息）
                   可以在建立连接的同时设定所要连接的数据库和所要使用的连接编码
                   可以单独设置所要连接的数据库
                   可以单独设置所要使用的连接编码
                   可以断开连接
               实例化该类并进行简单测试
               
        5. 面向对象总结:
                所有的关键字?
                所有魔术方法?
                所有的魔术常量?
                对象操作符（->）和范围操作符（::)使用情形?
                访问权限控制（public, protected, private) 使用情形?
                
                
**2016年09月03日:**

        1. 如何防止sql注入? 实现代码
        2. 编写PHP文件上传代码
        3. HTTP协议:
               请求行?
               请求头?
               请求主体?
           php模拟HTTP请求(fsockopen)
           
           
        3. 如何控制器浏览器缓存? 代码
        4. 让我继续想想