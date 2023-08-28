using System
using SplashKitSDK;
namespace shapeDrawer1
{
    public class Program
    {
        public static void Main()
        {
            Window window = new Window("Shape Drawer", 800,
          600);
            do
            {
                SplashKit.ProcessEvents();
                SplashKit.ClearScreen();
                SplashKit.RefreshScreen();
            } while (!window.CloseRequested);
        }
    }
}