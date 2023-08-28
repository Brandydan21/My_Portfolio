using SplashKitSDK;
namespace ShapeDrawer
{
    public class Program
    {
        public static void Main()
        {
            Window window = new Window(“Shape Drawer”, 800,
          600);
            do
            {shKit.ProcessEvents();
                Splas
                SplahKit.ClearScreen();
                SplashKit.RefreshScreen();
            } while (!window.CloseRequested);
        }
    }
}
