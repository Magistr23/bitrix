{"version":3,"file":"info-helper.map.js","names":["BX","namespace","UI","InfoHelper","frameUrlTemplate","frameNode","popupLoader","availableDomainList","frameUrl","inited","init","params","this","ajax","runAction","data","currentUrl","window","location","href","then","response","bind","trialableFeatureList","demoStatus","proxy","event","origin","indexOf","action","close","open","reloadParent","url","top","SidePanel","Instance","code","option","__showExternal","licenseAgreed","ajaxRestPath","callback","result","slider","getTopSlider","contentWindow","postMessage","dataType","method","sessid","bitrix_sessid","onsuccess","onfailure","error_type","error","success","onCustomEvent","featureId","width","sliderId","getSliderId","frame","create","attrs","className","src","contentCallback","Promise","resolve","reject","replace","id","children","getLoader","loader","cacheable","customRightBoundary","events","onLoad","showFrame","show","isOpen","Type","isPlainObject","isLimit","sendLimitSliderAnalyticsAjax","isArray","Uri","addParam","join","getFrame","getContent","onClose","analyticsLabels","defaultAnalyticsLabels","limits","limitAnalyticsLabels","Object","assign","module","console","info","analyticsLabel","getSlider","content","setTimeout","classList","add","Loader","target","size","container","sliderTop","getPreviousSlider","reload","isInited"],"sources":["info-helper.js"],"mappings":"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"}