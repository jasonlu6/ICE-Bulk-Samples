# File: ice_storage.py
# Outside sources: requires a SQL Lite database to store the ICE samples
# Author: Jason Lu (jasonlu6@bu.edu)
# Densmore CIDARLAB UROP Project #6 (WETLAB division)

# Collaborations:
# Chris Rodriguez (Fluigi Team)
# Rohin Banerji (rohinb96@bu.edu) (Class of 2019 Fellow Undergraduate CE student)
# Professor Douglas Densmore (dougd@bu.edu)
# Marliene Pavan (mapavan@bu.edu) (Supervisor / Senior Researcher at BU)

'''Description: This program will take the data provided in a SQL file called
jove_article.db, which is a SQL LITE database (from the BU PHP admin) that will store
all of the relevant / pertinent data from the JoVE Article Experiment'''

'''Source website from the JoVE article:'''
'''https://ice.cidarlab.org/folders/8'''

'''Used with phpbin (for research purposes only)'''

# import the sqllite module
import sqlite3

# connector method for sqlite
conn = sqlite3.connect('build_communation.db')

# make a cursor object named c
# c = conn.cursor()

# create the table
def createTable():
    with conn:
        

# insert the row of data
def insertRow():
    with conn:
        c = conn.cursor()
        # ask the user to input sample number: 
        sample_number = input('Please enter your sample number: ')
        # ask the user to input part ID: 
        part_id = input('Please enter your sample part ID: ')
        # ask the user to input type:
        bio_type = input('Please enter the type of your sample: ')
        # ask the user for the Principal Investigator (supervisor)
        pi_name = input('Principal Investigator name: ')
        # ask the user for the Principal Investigator (email)
        pi_email = input('Principal Investigator email: ')
        # ask the user for funding source
        funding = input('Please enter your funding source: ')
        # ask the user bio-safety level (logistics)
        bio_safety = input('Please enter your BioSafety Level: ')
        # keywords / related information
        # enter the name of the sample
        sample_name = input('Please enter the name of your sample: ')
        keywords = input('Please enter any related keywords: ')
        # summary / synopsis of well experiment
        summary = input('Please enter a short summary: ')
        # status of the project
        # codes:
        # blue = planned, red = postponed / cancelled, yellow = delayed, green = completed
        status = input('Please enter the sample status: ')
        # creator name
        name = input('Please enter the creator name: ')
        # creator email
        email = input('Please enter the creator email: ')
        # selection markers
        selection_marker = input('Please enter the selection marker: ')
        # symbol, corresponding to status of project
        symbol = input('Please enter the color of symbol for sample: ')
        # link
        url = input('Please enter the full URL / hyperlink for symbol: ')

        # insert the row of data
        # figure out how to insert user input into the data
        # make sure all 15 inputs are inserted correctly before execution! 
        c.execute('INSERT INTO communication VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);',
                  (sample_number,part_id,bio_type,pi_name,pi_email,funding,bio_safety,
                   sample_name,keywords,summary,status,name,email,selection_marker,symbol,url))

        # commit the change
        con.commit()

    # main function
def main():
    print('Enter the data for the build_communications database: ')
    insertRow()
main()
        
    
