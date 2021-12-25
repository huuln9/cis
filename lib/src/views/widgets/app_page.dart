import 'dart:io';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';
import 'package:webview_flutter/webview_flutter.dart';

class AppPage extends StatefulWidget {
  const AppPage({Key? key}) : super(key: key);

  @override
  State<AppPage> createState() => _AppPageState();
}

class _AppPageState extends State<AppPage> {
  @override
  void initState() {
    super.initState();
    try {
      if (Platform.isAndroid) WebView.platform = AndroidWebView();
    } catch (e) {
      WebView.platform = AndroidWebView();
    }
  }

  @override
  Widget build(BuildContext context) {
    ConfigurationController configurationController = Get.find();
    final config = configurationController.configuration;
    final appPageWebViewURL = config['appPageWebViewURL'];

    return SafeArea(
      child: WebView(
        initialUrl: appPageWebViewURL,
        javascriptMode: JavascriptMode.unrestricted,
      ),
    );
  }
}
