#!/bin/bash

STARTDATE="2020-11-01"
TITLE="TITLETODO"
URL="https://www.masayume.it/blog/node/add/blog"
HEADER="Content-Type: application/x-www-form-urlencoded" 

for ((days=1;days<11;days++)); do
 	# your-unix-command-here
	newdate=$(date +%Y-%m-%d -d "${STARTDATE} +$days days")
	title=$TITLE$days

   	out=$(( $days % 2 ))
   	if [ $out -eq 0 ]
   	then
		post="left"
   	else
		post="right"
   	fi

	echo
	echo "# -----------------------------------------------------------------------------------------------"
	echo "# " $newdate " " $title " " $post
	echo "# -----------------------------------------------------------------------------------------------"

	request="title=$title&body%5Bund%5D%5B0%5D%5Bvalue%5D=%3Cimg+class%3D%22img-responsive%22+vspace%3D%225%22+hspace%3D%225%22+align%3D%22$post%22+src%3D%22%2Fimg%2Fmasayume%2Fokuribito.jpg%22+width%3D%22%22+alt%3D%22okuribito%22%2F%3E%0D%0A%3Cbr+clear%3D%22all%22%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%3Ca+href%3D%22URL%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3ELINK%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E%0D%0A%0D%0A%3Csmall%3E%3Ca+href%3D%22%22+target%3D%22_blank%22%3E%3Cb%3E%3Ci%3E+%5Bvia%5D+%3C%2Fi%3E%3C%2Fb%3E%3C%2Fa%3E+%3C%2Fsmall%3E+%0D%0A%3Cbr+clear%3D%22all%22%3E%3C%21--break--%3E%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A&body%5Bund%5D%5B0%5D%5Bformat%5D=2&changed=&form_build_id=form-maxo14BahMs8u7j44BLjpyxr-w8ksecH5GqKhU_269o&form_token=Xkk6DVJlTXt5AY92dOAWn-UmkVML6DfabDhLOFCYklQ&form_id=blog_node_form&menu%5Blink_title%5D=&menu%5Bdescription%5D=&menu%5Bparent%5D=main-menu%3A0&menu%5Bweight%5D=0&log=&xmlsitemap%5Bstatus%5D=default&xmlsitemap%5Bpriority%5D=default&path%5Bpathauto%5D=1&path%5Balias%5D=&comment=2&metatags%5Btitle%5D%5Bvalue%5D=%5Bnode%3Atitle%5D+%7C+%5Bsite%3Aname%5D&metatags%5Btitle%5D%5Bdefault%5D=%5Bnode%3Atitle%5D+%7C+%5Bsite%3Aname%5D&metatags%5Bdescription%5D%5Bvalue%5D=%5Bnode%3Asummary%5D&metatags%5Bdescription%5D%5Bdefault%5D=%5Bnode%3Asummary%5D&metatags%5Babstract%5D%5Bvalue%5D=&metatags%5Bkeywords%5D%5Bvalue%5D=&metatags%5Brobots%5D%5Bvalue%5D%5Bindex%5D=index&metatags%5Brobots%5D%5Bvalue%5D%5Bnofollow%5D=nofollow&metatags%5Brobots%5D%5Bdefault%5D=index+nofollow+0+0+0+0+0+0+0+0&metatags%5Bnews_keywords%5D%5Bvalue%5D=&metatags%5Bstandout%5D%5Bvalue%5D=&metatags%5Brights%5D%5Bvalue%5D=&metatags%5Bimage_src%5D%5Bvalue%5D=&metatags%5Bcanonical%5D%5Bvalue%5D=%5Bcurrent-page%3Aurl%3Aabsolute%5D&metatags%5Bcanonical%5D%5Bdefault%5D=%5Bcurrent-page%3Aurl%3Aabsolute%5D&metatags%5Bshortlink%5D%5Bvalue%5D=%5Bcurrent-page%3Aurl%3Aunaliased%5D&metatags%5Bshortlink%5D%5Bdefault%5D=%5Bcurrent-page%3Aurl%3Aunaliased%5D&metatags%5Bpublisher%5D%5Bvalue%5D=&metatags%5Bauthor%5D%5Bvalue%5D=&metatags%5Boriginal-source%5D%5Bvalue%5D=&metatags%5Brevisit-after%5D%5Bvalue%5D=&metatags%5Brevisit-after%5D%5Bperiod%5D=&metatags%5Bcontent-language%5D%5Bvalue%5D=&name=masayume&date=$newdate&promote=1&additional_settings__active_tab=edit-author&op=Save" 

	echo "curl -d \""$request\"" -H \"$HEADER\" -b '$EXTCOOKIE;' -X POST $URL"

	echo
	echo

done

