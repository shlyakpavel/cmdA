#!/usr/bin/env python3

import MySQLdb as s
import sys

conn = s.connect()
cursor = conn.cursor()

cursor.execute("SELECT COUNT(*) FROM log WHERE id = " + sys.argv[1])

row = cursor.fetchall()

print("<!DOCTYPE html> <html> <head> <link rel=\"stylesheet\" type=\"text/css\" href=\"tonkusha.css\"> <title>Score</title> </head> <body> <h1>User's score: </h1> ", row[0][0], " </body> </html>")

conn.close()
