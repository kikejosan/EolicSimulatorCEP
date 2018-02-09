if WScript.Arguments.Count < 2 Then
    WScript.Echo "Please specify the source and the destination files. Usage: ExcelToCsv <xls/xlsx source file> <csv destination file>"
    Wscript.Quit
End If

csv_format = 6

Set objFSO = CreateObject("Scripting.FileSystemObject")
Set oShell = WScript.CreateObject ("WScript.Shell")


src_file = objFSO.GetAbsolutePathName(Wscript.Arguments.Item(0))
dest_file = objFSO.GetAbsolutePathName(WScript.Arguments.Item(1))


WScript.Echo src_file
WScript.Echo dest_file
strComand = "paradox-dbase-reader.exe -c -i " & src_file & " -o " & dest_file & " -f excel"

oShell.Run strComand


