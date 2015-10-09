# Office-Add-in-Bing-Search

A task pane add-in that allows you to search Bing.

## Prerequisites

To use this sample:

* Install PHP
* Install and run a web service, like Apache
* Create an Azure account and register it with http://datamarket.azure.com/dataset/explore/bing/searchweb to get a key
* Create a share directory to run your Office Add-in

## Run the sample

1. Save the bing.php, bing.html, bing.js, and bing.css files in a folder under the directory that your web service uses to run web pages. For example, if you install and use XAMPP to run Apache, it will be installed in **C:\xampp**, and an **htdocs** folder located at **C:\xampp\htdocs** is created for you. The web service will run pages stored in the htdocs folder with the URL http://localhost. 
2. To run the sample, open the manifest file `PPTBingSearchAddin.xml` and change the `<SourceLocation DefaultValue>` setting to the path of the bing.html file. For example: `<SourceLocation DefaultValue="http://localhost/bing.html?addin=1" />`
3. Open the bing.php file, and replace `Insert your account key` with your Bing Search key.
5. Finally, save the manifest file in a directory on a shared network, and follow the directions [here](https://msdn.microsoft.com/EN-US/library/office/fp123503.aspx) to run the sample.

## Questions and comments

* If you have any trouble running this sample, please [log an issue](https://github.com/OfficeDev/Office-Add-in-Bing-Search/issues).
* Questions about Office Add-ins development in general should be posted to [Stack Overflow](http://stackoverflow.com/questions/tagged/office-addins). Make sure that your questions or comments are tagged with [office-addins].

## Additional resources

* [Office Add-ins](http://msdn.microsoft.com/library/office/jj220060.aspx)  documentation on MSDN
* [Publish your Office Add-in](https://msdn.microsoft.com/EN-US/library/fp123515.aspx)
* [More Add-in samples](https://github.com/OfficeDev?utf8=%E2%9C%93&query=-Add-in)

## Copyright
Copyright (c) 2015 Microsoft. All rights reserved.
