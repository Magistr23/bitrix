<? $GLOBALS['____1567249600']= array(base64_decode(''.'ZX'.'Jyb'.'3JfcmVwb3J0aW5n'),base64_decode('ZG'.'V'.'m'.'aW5l'),base64_decode(''.'bWlj'.'cm90aW1l'),base64_decode('ZGVm'.'aW'.'5lZA=='),base64_decode('ZGV'.'m'.'a'.'W5'.'l'),base64_decode('c3RydG91c'.'HBlcg='.'='),base64_decode(''.'c2V0Y29'.'v'.'a'.'2ll'),base64_decode('ZGVma'.'W5l'),base64_decode('Zmls'.'Z'.'V9leG'.'lz'.'dHM='));if(!function_exists(__NAMESPACE__.'\\___1435691935')){function ___1435691935($_834698861){static $_1947297507= false; if($_1947297507 == false) $_1947297507=array('U1RB'.'UlRfRVhFQ1'.'9'.'U'.'SU1F','Ql9'.'QUk9M'.'T0dfSU5DTF'.'V'.'ERUQ=','Ql9'.'Q'.'U'.'k9'.'MT'.'0dfSU5'.'DT'.'FVERUQ=','L2'.'J'.'4X3Jvb3Q'.'ucG'.'hw','L2xpYi'.'9sb2'.'F'.'kZXI'.'ucGhw','L'.'2lu'.'Y2'.'x1ZGUvYXV0b2xvYWQucG'.'hw','L2Ns'.'Y'.'X'.'Nz'.'ZX'.'MvZ'.'2V'.'u'.'ZXJ'.'h'.'b'.'C9'.'2ZXJz'.'aW'.'9u'.'L'.'nBoc'.'A==','L3Rvb2xzLn'.'BocA'.'==',''.'RE9DVU1'.'FTl'.'RfUk9'.'PVA'.'==','L'.'3'.'BocF9p'.'bnRl'.'cmZhY2UvZGJjb'.'25uL'.'nBocA==','bXlzcWw=','','','','','L2luY2x1'.'ZGUvY'.'29uc'.'3R'.'hbn'.'R'.'zLnBo'.'c'.'A='.'=','RE'.'I=','REI=',''.'REI=','R'.'E9'.'DVU1F'.'Tl'.'RfUk9PVA==','L2'.'1'.'5c3'.'F'.'sX2RlYnVn'.'LnN'.'xbA==','','c2hvd19zcWx'.'fc3'.'Rhd'.'A==','c'.'2h'.'vd'.'1'.'9z'.'c'.'W'.'xfc3RhdA==','WQ'.'==',''.'WQ'.'==','','c2hvd19zcWx'.'f'.'c3'.'RhdA==','L'.'w==','c2hvd1'.'9z'.'c'.'W'.'xfc3R'.'hdA'.'==','c2'.'hvd1'.'9zcWx'.'fc3RhdA='.'=',''.'WQ==','REI=','TE'.'lDRU'.'5TR'.'V9LRVk=',''.'Q0FD'.'SEVf'.'U'.'1RBV'.'F9CWVRFUw==','Q0FDSEVfT'.'U'.'F'.'OQUdFU'.'g==',''.'c3'.'RhY2'.'t'.'DYWNoZU1hbmF'.'nZX'.'I=','L2NsYXNz'.'ZXMvZ2VuZXJ'.'hb'.'C91cGRhdGVf'.'ZGJfdXBkYXRlci'.'5waHA=');return base64_decode($_1947297507[$_834698861]);}};  $GLOBALS['____1567249600'][0](E_COMPILE_ERROR| E_ERROR| E_CORE_ERROR| E_PARSE); $GLOBALS['____1567249600'][1](___1435691935(0), $GLOBALS['____1567249600'][2](true)); if(!$GLOBALS['____1567249600'][3](___1435691935(1))){ $GLOBALS['____1567249600'][4](___1435691935(2), true);} require_once __DIR__. ___1435691935(3); require_once __DIR__. ___1435691935(4); require_once __DIR__. ___1435691935(5); require_once __DIR__. ___1435691935(6);  require_once __DIR__. ___1435691935(7);  FormDecode(); $_454746347= \Bitrix\Main\HttpApplication::getInstance();  global $DBType, $DBDebug, $DBDebugToFile, $DBHost, $DBName, $DBLogin, $DBPassword;  require_once($_SERVER[___1435691935(8)]. BX_PERSONAL_ROOT. ___1435691935(9));  $DBType= ___1435691935(10); $DBHost= ___1435691935(11); $DBLogin= ___1435691935(12); $DBPassword= ___1435691935(13); $DBName= ___1435691935(14);  require_once __DIR__. ___1435691935(15);  CAllDatabase::registerAutoload();  $GLOBALS[___1435691935(16)]= new CDatabase(); $GLOBALS[___1435691935(17)]->debug= $DBDebug; if($DBDebugToFile){ $GLOBALS[___1435691935(18)]->DebugToFile= true; $_454746347->getConnection()->startTracker()->startFileLog($_SERVER[___1435691935(19)]. ___1435691935(20));}  $_2084055887= ___1435691935(21); if(isset($_GET[___1435691935(22)])){ $_2084055887=($GLOBALS['____1567249600'][5]($_GET[___1435691935(23)]) == ___1435691935(24)? ___1435691935(25): ___1435691935(26)); $GLOBALS['____1567249600'][6](___1435691935(27), $_2084055887, false, ___1435691935(28));} elseif(isset($_COOKIE[___1435691935(29)])){ $_2084055887= $_COOKIE[___1435691935(30)];} if($_2084055887 == ___1435691935(31)){ $GLOBALS[___1435691935(32)]->ShowSqlStat= true; $_454746347->getConnection()->startTracker();}  $GLOBALS['____1567249600'][7](___1435691935(33), $_454746347->getLicense()->getKey());  $GLOBALS[___1435691935(34)]= min(114,0,38); $GLOBALS[___1435691935(35)]= new CCacheManager; $GLOBALS[___1435691935(36)]= new CStackCacheManager(); if($GLOBALS['____1567249600'][8](($_2085605439= __DIR__. ___1435691935(37)))){ $US_HOST_PROCESS_MAIN= true; include $_2085605439;}?>