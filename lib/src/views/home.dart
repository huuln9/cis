import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/views/widgets/menu_grid.dart';
import 'package:vncitizens_home/src/views/widgets/place.dart';
import 'package:vncitizens_home/vncitizens_home.dart';

class Home extends StatefulWidget {
  const Home({Key? key}) : super(key: key);

  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  int _currentScreenIndex = 0;
  final List<Screen> _listScreen = [
    Screen(
      body: const MenuGrid(),
      icon: const Icon(Icons.home, color: Colors.red, size: 35),
      label: 'Home',
      navigatorKey: Get.nestedKey(0),
    ),
    Screen(
      body: const MyNotification(),
      icon: SizedBox(
          width: 35,
          height: 35,
          child: Image.network(
              'https://raw.githubusercontent.com/huuln9/images/main/notification-icon.png')),
      label: 'Notifications',
      navigatorKey: Get.nestedKey(1),
    ),
    Screen(
      body: const Tgg(),
      icon: SizedBox(
          width: 35,
          height: 35,
          child: Image.network(
              'https://raw.githubusercontent.com/huuln9/images/main/tgg-icon.png')),
      label: 'Tiền Giang',
      navigatorKey: Get.nestedKey(2),
    ),
    Screen(
      body: const MenuList(),
      icon: SizedBox(
          width: 35,
          height: 35,
          child: Image.network(
              'https://raw.githubusercontent.com/huuln9/images/main/setting-icon.png')),
      label: 'Setting',
      navigatorKey: Get.nestedKey(3),
    ),
    Screen(
      body: const MenuList(),
      icon: SizedBox(
          width: 35,
          height: 35,
          child: Image.network(
              'https://raw.githubusercontent.com/huuln9/images/main/menu-icon.png')),
      label: "Menu",
      navigatorKey: Get.nestedKey(4),
    ),
  ];

  Widget _navigationTab(
      {GlobalKey<NavigatorState>? navigatorKey, Widget? widget}) {
    return Navigator(
      key: navigatorKey,
      onGenerateRoute: (RouteSettings settings) {
        if (settings.name == '/place') {
          // final args = settings.arguments as List;
          return GetPageRoute(page: () => const Place());
        }
        return GetPageRoute(page: () => widget!);
      },
    );
  }

  Widget _bottomNavigationBar() {
    return BottomNavigationBar(
      selectedItemColor: Colors.blueAccent,
      type: BottomNavigationBarType.fixed,
      currentIndex: _currentScreenIndex,
      onTap: (int index) {
        _selectTab(index);
      },
      items: _listScreen
          .map((e) => BottomNavigationBarItem(icon: e.icon, label: e.label))
          .toList(),
    );
  }

  void _selectTab(int index) {
    if (index == _currentScreenIndex) {
      _listScreen[index]
          .navigatorKey!
          .currentState!
          .popUntil((route) => route.isFirst);
    } else {
      setState(() {
        _currentScreenIndex = index;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      onWillPop: () async {
        final isFirstRouteInCurrentTab = !await _listScreen[_currentScreenIndex]
            .navigatorKey!
            .currentState!
            .maybePop();
        if (isFirstRouteInCurrentTab) {
          if (_currentScreenIndex != 0) {
            _selectTab(1);
            return false;
          }
        }
        // let system handle back button if we're on the first route
        return isFirstRouteInCurrentTab;
      },
      child: Scaffold(
        body: IndexedStack(
            index: _currentScreenIndex,
            children: _listScreen
                .map((e) => _navigationTab(
                    navigatorKey: e.navigatorKey, widget: e.body))
                .toList()),
        bottomNavigationBar: _bottomNavigationBar(),
      ),
    );
  }
}

class Screen {
  final Widget body;
  final Widget icon;
  final String label;
  final GlobalKey<NavigatorState>? navigatorKey;

  Screen({
    required this.body,
    required this.icon,
    required this.label,
    required this.navigatorKey,
  });
}
