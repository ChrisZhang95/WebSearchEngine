from __future__ import division
from bottle import route, run, request, template, static_file, get
import operator
from datetime import datetime
import sqlite3 as lite
import pickle

#globel variable for input
#input = ""
#a list of words from one search attempt
inputWords = []
#a list of all the words in search history
storedWords = []
#a dictionary of words being searched and 
dictionary = {}
#boolean value to determine if the server already launched
launched = False


@route ('/')
def html():
    global launched
    if launched == False:
    	#everytime reload the website stored value would be gone
    	del inputWords[:]
    	del storedWords[:]
        launched = True
        
    return template('homepage.tpl', input = input)

#handle input value when typed in
@route('/', method='POST')
def do_login():
    global searched
    matched = False
    firstlettermatched = False
    urlsDic = {}
    firstletterlist = []
	#get input value from seachbarz
    input = request.forms.get('keywords')
    #split the input into individual words
    inputWords = input.split()
    #getting the first word 
    firstword = inputWords[0]
    #math search
    if firstword == 'math:':
        equation = ""
        for word in inputWords:
            if word != 'math:':
                equation += word
        command = 'answer = ' + equation
        exec(command)
        result = 'Result: ' + equation + '=' + str(answer)
        sortedDic = 'ERROR'
        return template('result.tpl', result = result, sortedDic = sortedDic)
    #time search
    elif firstword == 'date:':
        result = 'Today is: ' + datetime.now().strftime('%Y-%m-%d')
        sortedDic = 'ERROR'
        return template('result.tpl', result = result, sortedDic = sortedDic)
    #normal keyword search
    elif firstword != "":
        sortedDic = ""
        con = lite.connect ("dbFile.db")
        cur = con.cursor()
        #get all the data from _resolved_inverted_index table
        selection = cur.execute('SELECT word, url from _resolved_inverted_index_DB')
        outputtable = "<table> <tr><td>URL</td> </tr>"
        unpacked = set()
        for row in selection:
            #check if the keyword exists
            if row[0] == firstword:
                unpacked = pickle.loads(row[1])
                matched = True
            elif firstword[0] == row[0][0] and firstword[-1] == row[0][-1]:
                firstletterlist.append(row[0])
                firstlettermatched = True
        #get all the data from _document table
        document =  cur.execute('SELECT id, url from _document_DB')
        if matched == True:
            for row in document:
                for url in unpacked:
                    if row[1] == url:
                        urlsDic[row[0]] = url
            #get all the data from pagerank table
            pageRank = cur.execute('SELECT url_id, rank from _page_rank_DB')
            for url_id in urlsDic:
                for row in pageRank:
                    if url_id == row[0]:
                        urlsDic[url_id] == row[1]
            sortedDic = sorted(urlsDic.items(), key = operator.itemgetter(0), reverse = False)
            
        #if the keyword does not exist
        if matched == False:
            sortedDic = 'ERROR'
            result = ""
            #word suggestions if search doesn't exist
            return template('result.tpl', sortedDic = sortedDic, firstletterlist = firstletterlist, result = result)
        #if the keyword is found 
        else:
            result = ""
            return template('result.tpl', sortedDic = sortedDic, result = result)
    


run(host='localhost', port=8080, debug=True)
